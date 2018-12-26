<?php 

$forms->addHookBefore('FormBuilderProcessor::renderReady', function($event) {
    $form = $event->arguments(0);
    if($form->name != 'YOUR_FORM_NAME') return;
    $user = $event->wire('user');
    $field = $form->getChildByName('biography');
    $field->label = "Hi $user->name please tell us about yourself";
}); 


$forms->addHookBefore('FormBuilderProcessor::emailForm', function($event) {
	$processor = $event->object;
	$formData = $event->arguments(1); // associative array of form data, if needed
	$subjectField = $formData->getChildByName('your_field')->value;
	$processor->emailSubject = $processor->emailSubject . " (" . $subjectField . ")";
});