<?php

// Validate FormBuilder fields while processing form 

wire()->addHookBefore("FormBuilderProcessor::processInputDone", function($event) {
    
    $form  = $event->arguments(0);

    if($form->name == 'yourFormName') {
        
        $field1 = $form->getChildByName('your_first_field');
        $field2 = $form->getChildByName('your_second_field');
        
        $val1 = $field1->value;
        $val2 = $field2->value;
        
        // check, validate, do whatever you want
        if($val1 > $val2) {
            $field1->error("Error message field1.");
            $field2->error("Error message field2.");
        }

    }

});


