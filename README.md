# SugarCRM_Tags_From_Description
Automatically relates Tag to record from #tag in stock Description field in Sugar modules

Specifications and considerations:
1. A before_save application hook applied to any module with a stock Description field and Tags
2. Does not support tags with spaces in the name
3. Relates Tags of words in description field beginning with a hashtag
4. Does not remove Tag if hashtag word is not in description field or deleted from description field
5. Removes punctuation (periods, commas, question and exclamation marks, colons and semicolons, and closing parentheses and braces)
6. Hashtag must be preceded by a space or start of new line to register as the beginning of a tag

SugarCRM Community URL:
https://community.sugarcrm.com/message/98140-re-adding-tags-from-the-description-field?commentID=98140#comment-98140
