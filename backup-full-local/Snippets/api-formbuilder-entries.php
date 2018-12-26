<?php

$form = $forms->get('your-form-name');
$entries = $form->entries()->find("created<=" . strtotime("-3 MONTH")); 
// $entries now contains all your older-than-3-months entries