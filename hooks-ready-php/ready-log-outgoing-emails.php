<?php

// log all outgoing emails
// https://processwire-recipes.com/recipes/logging-outgoing-emails/

$wire->addHookAfter('WireMail::send', function($event) {
	
	$mail = $event->object;
	
	$event->wire('log')->save('sent-mail',
	
		"SENT ($event->return of " . count($mail->to) . "), " .
		
		"SUBJECT ($mail->subject), " .
		
		"TO (" .  implode(", ", $mail->to) . "), " .
		
		"FROM ($mail->from)"
		
	);
	
});
