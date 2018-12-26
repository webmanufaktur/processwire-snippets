<?

// ready.php
// redirect to page created by/with FormBuilder

wire()->addHookAfter('FormBuilderProcessor::savePage', function($event) {
    $processor = $event->object; 
    if($processor->formName != 'your_form_name') return;
    $page = $event->return;
    wire('session')->set('savePage', $page->id); 
}); 

wire()->addHookAfter('FormBuilderProcessor::render', function($event) {
    $processor = $event->object; 
    if($processor->formName != 'your_form_name' || !$processor->isSubmitted()) return; 
    $id = wire('session')->get('savePage'); 
    if(!$id) return;
    $page = wire('pages')->get($id); 
    if($page->id) $event->return = "<script>top.location.href = '$page->url';</script>";
});