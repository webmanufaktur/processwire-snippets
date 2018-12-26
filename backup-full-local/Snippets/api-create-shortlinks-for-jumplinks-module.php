<?php

// Create shortlinks for each page that matches criteria
// needs: JUMPLINKS module - http://modules.processwire.com/modules/process-jumplinks/

foreach($pages->find('template=your_template') as $yourpages)
{
    
    $from = "out/".$yourpages->id;
    $to   = $yourpages->www;

    $yourpages->setOutputFormatting(false);
    $yourpages->shorturl = "/".$from;
    $yourpages->save();
    
    $this->modules->ProcessJumplinks->add($from, $to);
    
};