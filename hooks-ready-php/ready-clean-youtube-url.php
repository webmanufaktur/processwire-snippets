<?php

// YouTube URL Cleander
$pages->addHookBefore('saveReady', function($event) {

    // makes it easier
    $page = $event->arguments[0];

    // Get your templates
    if($page->template == 'templateOne' || $page->template == 'templateTwo') {

        // set the filter
        $removeThis = array("https://youtu.be/", "https://www.youtube.com/watch?v=");

        // get your YouTube field
        $cleanUpThis = $page->videoYouTube;

        // clean it up
        $page->videoYouTube = str_replace($removeThis, "", $cleanUpThis);

        // saved and ready to use

    }
});


?>
