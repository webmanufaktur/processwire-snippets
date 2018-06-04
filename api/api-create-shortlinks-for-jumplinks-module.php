<?php

// Create shortlinks for each page that matches criteria
// needs: JUMPLINKS module - http://modules.processwire.com/modules/process-jumplinks/

foreach($pages->find('template=yourTemplate') as $yourpages) {

    // define a Jumplink path
    $from = "out/" . $yourpages->id;

    // define destination
    $to   = $yourpages->www;

    // http://cheatsheet.processwire.com/page/built-in-methods-reference/page-setoutputformatting-true-false/
    $yourpages->setOutputFormatting(false);

    // add jumplink path to page
    $yourpages->shorturl = "/" . $from;

    // save page
    $yourpages->save();

    // create jumplink in Jumplinks module
    $this->modules->ProcessJumplinks->add($from, $to);
    
};