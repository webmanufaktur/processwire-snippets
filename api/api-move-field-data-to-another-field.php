<?php

// Move content from one page field to another
// plus basic sanitizing

foreach($pages->find('template=yourTemplate') as $yourpages) {

    // define old field
    $old = $yourpages->oldfield;

    // http://cheatsheet.processwire.com/#sanitizer
    $oldcleaned = $sanitizer->text($old);
    
    // http://cheatsheet.processwire.com/page/built-in-methods-reference/page-setoutputformatting-true-false/
    $yourpages->setOutputFormatting(false);

    // place content in new field
    $yourpages->newfield = $oldcleaned;

    // save page
    $yourpages->save();

};

