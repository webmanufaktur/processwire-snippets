<?php 


// Purpose: Combine user registration with newsletter subscription
// Location: ready.php
// Module: https://modules.processwire.com/modules/login-register/
// Module: https://modules.processwire.com/modules/subscribe-to-mailchimp/
// DO NOT USE THIS IF YOU WANT TO STAY GDPR COMPLIANT
// code by @flydev
// Source: https://processwire.com/talk/topic/17327-loginregister-customisation/?tab=comments#comment-167076


wire()->addHookAfter('LoginRegister::processRegisterForm', function($event) {

    $form = $event->arguments[0];

    foreach($form->getAll() as $f) {

        $name = $f->attr('name');

        if(strpos($name, 'register_') !== 0) continue;

        if($name == 'register_subscribe_newsletter' && wire('input')->post->register_subscribe_newsletter == 1) {

            $mc = wire('modules')->get("SubscribeToMailchimp");

            $email = wire('input')->post->register_email; // Do not forget to saninitize the email field

            $mc->subscribe($email);

        }

    }

});