<?php namespace ProcessWire;

// Add subscriber to Mailchimp list while processing FormBuilder input
// DO NOT USE THIS IF YOU WANT TO STAY GDPR COMPLIANT

// Module: https://github.com/danielstieber/SubscribeToMailchimp

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

