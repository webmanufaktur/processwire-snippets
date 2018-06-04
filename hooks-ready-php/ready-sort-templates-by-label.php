<?php

// Sort templates by label
// Code by: 
// Source: https://processwire.com/talk/

$wire->addHookAfter('ProcessPageAdd::getAllowedTemplates', function(HookEvent $event) {

    // Get keys (IDs) of returned templates array
    $template_ids = array_keys($event->return);

    // Implode for use in a selector string
    $template_ids_str = implode('|', $template_ids);

    // Get TemplatesArray of those templates, sorted by label
    $templates = $this->templates->find("id=$template_ids_str, sort=label");

    // Convert to plain array and return
    $event->return = $templates->getArray();

});