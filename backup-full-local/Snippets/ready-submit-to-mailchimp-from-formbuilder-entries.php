<?php namespace ProcessWire;


$entries = $forms->get("mailchimp")->entries()->find('sort=id');

foreach($entries as $entry){
	$mc = $modules->get("SubscribeToMailchimp");

	$mc_mail 	= 	$entry['e_mail'];
	$mc_fname 	= 	$entry['vorname'];

	$subscriber = [
		'FNAME' => $mc_fname,
		//'SEO' => $input->post->seo,
	];

	$mc->subscribe($mc_mail, $subscriber, '40f97f3378');

	wire('log')->save('mailchimp', $mc_mail . " - " . $mc_fname );

}