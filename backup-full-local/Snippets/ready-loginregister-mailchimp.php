<?php 

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