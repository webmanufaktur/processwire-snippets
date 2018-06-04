<?php

# https://processwire.com/talk/topic/17436-solved-close-events-with-startdate-and-enddate/?tab=comments#comment-153195

wire()->addHookAfter('LazyCron::every30Minutes', function (HookEvent $e) {

  $closables = $e->pages->find("closed=0, enddate<now");
  foreach ($closables as $p) $p->setAndSave('closed', 1);

  $openables = $e->pages->find("closed=1, startdate<now, enddate>now");
  foreach ($openables as $p) $p->setAndSave('closed', 0);

});