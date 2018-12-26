<?

// ready.php
// Validate FormBuilder fields while processing form 

wire()->addHookAfter('FormBuilderProcessor::savePage', function($event) {
  $processor = $event->object; 
  if($processor->formName != 'your_form_name') return;
  $page = $event->return;
  wire('session')->set('savePage', $page->id); 
});