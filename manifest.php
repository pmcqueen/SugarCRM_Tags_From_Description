<?php

    $manifest = array(
        'acceptable_sugar_flavors' => array('CE','PRO','CORP','ENT','ULT'),
        'acceptable_sugar_versions' => array(
            'exact_matches' => array(),
            'regex_matches' => array('(.*?)\\.(.*?)\\.(.*?)$'),
        ),
        'author' => 'Patrick McQueen',
        'description' => 'Automatically relates Tags to record from #tags in stock Description field',
        'icon' => '',
        'is_uninstallable' => true,
        'name' => 'Dynamic Tags from Description Fields',
        'published_date' => '2018-2-18',
        'type' => 'module',
        'version' => '1.0',
    );

    $installdefs = array(
        'copy' => array(
            0 => array(
                'from' => '<basepath>/Files/dynamicTagsHook.php',
                'to' => 'custom/Extension/application/Ext/LogicHooks/dynamicTagsHook.php',
            ),
            1 => array(
                'from' => '<basepath>/Files/dynamicTags.php',
                'to' => 'custom/dynamicTags.php',
            ),
        ),
    );