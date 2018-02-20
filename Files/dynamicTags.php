<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class dynamicTagsClass
{
    function dynamicTagsMethod ($bean, $event, $arguments)
    {

        //Only run if the description field has been edited.
        if ($bean->fetched_row['description'] !== $bean->description) {
            $link = "tag_link"; //name of relationship: bean to Tags
            $tags = ["tag"=> []]; //array for relating tags

            //retreive tags already related to the target record
            if ($bean->load_relationship($link)) {
                $relatedTags = $bean->$link->getBeans();
                if (!empty($relatedTags)) {

                    //tag relationships cannot survive this hook
                    //so to preserve already related tags, we must re-relate them
                    foreach ($relatedTags as $relatedTag) {
                        array_push($tags[tag],$relatedTag->name); 
                    }
                }
            }
            $desc = $bean->description;
            $desc = preg_replace("/\r|\n/", " ",$desc); //convert line breaks to spaces
            $descArray = [];
            $tagArray = [];
            $tagField = $bean->getTagField();
            $tagFieldProperties = $bean->field_defs[$tagField];
            $descArray = explode(" ", $desc); //split description into array items at each space
            foreach ($descArray as $key => $descValue){
                if (substr($descValue, 0, 1) == '#') {
                    $descValue = substr($descValue,1); 
                    array_push($tagArray,$descValue); //makes array of only those words beginning with hashtag
                    foreach($tagArray as $tagName){
                        $tagName = preg_replace('/[.,;:?!)}]/', '', $tagName); //removes punctuation from each word
                        array_push($tags[tag],$tagName); //adds hashtag words as tags
                    }
                }
            }

            //create and relate new and exiting tag records
            $SugarFieldTag = new SugarFieldTag();
            $SugarFieldTag->apiSave($bean, $tags, $tagField, $tagFieldProperties);
        }
    }
}

?>