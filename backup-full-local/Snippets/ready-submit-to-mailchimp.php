<?php namespace ProcessWire;


// ready.php
// Validate FormBuilder fields while processing form 
// Module: https://github.com/danielstieber/SubscribeToMailchimp

wire()->addHookBefore("FormBuilderProcessor::processInputDone", function($event) {
    
    $form  = $event->arguments(0);

    if($form->name == 'mailchimp') {
        
        $mc_EMAIL = $form->getChildByName('e_mail')->value;
        $mc_FNAME = $form->getChildByName('vorname')->value;
        $mc_SEO = $form->getChildByName('seo')->value;



        $mc = wire('modules')->get("SubscribeToMailchimp");
        
        $subscriber = [
          'FNAME' => $mc_FNAME,
          'SEO' => $mc_SEO
        ];

        $mc->subscribe($mc_EMAIL, $subscriber);

        wire('log')->save('mailchimp', $mc_EMAIL );


    }

});

