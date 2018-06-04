<?php

// Set session variable savePage with created page by FormBuilder 
// Code by: @ryan

wire()->addHookAfter('FormBuilderProcessor::savePage', function($event) {
	$processor = $event->object; 
	if($processor->formName != 'yourFormName') return;
	$page = $event->return;
	wire('session')->set('savePage', $page->id); 
});