<?php

// Move content from one page field to another
// plus basic sanitizing

foreach($pages->find('template=your_template') as $yourpages)
{
    
    $old = $yourpages->oldfield;
    $oldcleaned = $sanitizer->text($old);
    
    $yourpages->setOutputFormatting(false);
    $yourpages->newfield = $oldcleaned;
    $yourpages->save();

};

