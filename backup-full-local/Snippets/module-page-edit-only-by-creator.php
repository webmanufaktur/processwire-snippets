<?php
/**
 * Edit Yours Only
 *
 */

class EditYoursOnly extends WireData implements Module {
	public static function getModuleInfo() {
		return array(
			'title' => 'Edit Yours Only', 
			'version' => 1, 
			'summary' => 'Custom module to allow users only to edit pages they created. Applies to role \'standard\'',
			'author' => 'Christina Holly, TinaciousDesign.com',
			'singular' => true, 
			'autoload' => true, 
			);
	}

	public function init() {
	    if($this->user->hasRole("standard")) $this->addHookAfter("Page::editable", $this, 'editable'); 
	}

	public function editable(HookEvent $event) {
	    // abort if no access
	    if(!$event->return) return; 
	    $page = $event->object; 
	    // criteria required in order to edit
	    if($this->user->name !== $page->createdUser->name) $event->return = false; 
	}
}