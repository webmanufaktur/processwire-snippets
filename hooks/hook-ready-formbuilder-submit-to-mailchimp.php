<?php namespace ProcessWire;

// Purpose: Add subscriber to Mailchimp list while processing FormBuilder input
// Location: ready.php
// Module: https://github.com/danielstieber/SubscribeToMailchimp
// DO NOT USE THIS IF YOU WANT TO STAY GDPR COMPLIANT


wire()->addHookBefore("FormBuilderProcessor::processInputDone", function($event) {
    
    $form  = $event->arguments(0);

    if($form->name == 'mailchimp') {
        
        $mc_EMAIL = $form->getChildByName('e_mail')->value;
        $mc_FNAME = $form->getChildByName('vorname')->value;

        $mc = wire('modules')->get("SubscribeToMailchimp");
        
        $subscriber = [
          'FNAME' => $mc_FNAME
        ];

        $mc->subscribe($mc_EMAIL, $subscriber);

        wire('log')->save('mailchimp', $mc_EMAIL );

    }

});