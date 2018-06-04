<?php

// get FormBuilder entries (older 3 months)
// https://processwire.com/api/modules/form-builder/

// define which form
$form = $forms->get('your-form-name');

// define entries you want to find (example: created 3 months ago)
// Todo: more examples
$entries = $form->entries()->find("created<=" . strtotime("-3 MONTH")); 
