<?php namespace ProcessWire;

// Purpose: change FormBuilder subject, add details from user input
// Location: ready.php

$forms->addHookBefore('FormBuilderProcessor::emailForm', function($event) {

    $form = $event->object;
    $formData = $event->arguments(0);

    if($form->name == "yourFormNameHere") {
        $subjectField = $formData->getChildByName('yourSubjectField')->value;
        $form->emailSubject = $form->emailSubject . " (" . $subjectField . ")";
    }

});