<?php namespace ProcessWire;

// Add older FormBuilder entries to Mailchimp subscription list
// DO NOT USE THIS IF YOU WANT TO STAY GDPR COMPLIANT

$entries = $forms->get("mailchimp")->entries()->find('sort=id');

foreach($entries as $entry){
	$mc = $modules->get("SubscribeToMailchimp");

	$mc_mail 	= 	$entry['e_mail'];
	$mc_fname 	= 	$entry['vorname'];

	$subscriber = [
		'FNAME' => $mc_fname
	];

	$mc->subscribe($mc_mail, $subscriber, 'SUPERSECRETMCHASH');

	wire('log')->save('mailchimp', $mc_mail . " - " . $mc_fname );

}