<?php namespace ProcessWire;

wire()->addHookAfter('LazyCron::every30Seconds', function (HookEvent $e) {

    $age = (time() - (14 * 86400));
    $form = $e->forms->get("contact");
    $entriesOld 	= $form->entries()->find("created<$age"); 
    
    foreach($entriesOld as $entry) {
        $form->entries()->delete($entry[id]);
        $e->wire('log')->save('archiv', 'Kontaktanfrage gelöscht ' . $entry[created]);
    };

});