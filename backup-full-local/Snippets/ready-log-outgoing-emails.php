<?

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



<?php

# https://processwire.com/talk/topic/17436-solved-close-events-with-startdate-and-enddate/?tab=comments#comment-153195

wire()->addHookAfter('LazyCron::everyDay', function (HookEvent $e) {

    $now = date('d.m.Y');
    $closables = $e->pages->find("template=event, date<$now");

    wire('log')->save('archive', "message");

    foreach ($closables as $p) {
        $p->setOutputFormatting(false);
        $p->addStatus(Page::statusUnpublished);
        $p->save();
        
    };

});