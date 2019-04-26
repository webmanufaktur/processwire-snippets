<?php namespace ProcessWire;

// Purpose: change FormBuilder from address to user input
// Location: ready.php

$forms->addHookBefore('FormBuilderProcessor::emailForm', function($event) {

    $form = $event->object;
    $formData = $event->arguments(0);

    if($formData->name == "yourFormNameHere") {
        $fakefrom = $formData->getChildByName('yourEmailFieldHere')->value;
        $form->emailFrom = $fakefrom;
    }
    
});