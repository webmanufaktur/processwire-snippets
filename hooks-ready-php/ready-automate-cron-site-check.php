<?php

// Automate cron site check
// https://processwire.com/talk/topic/17436-solved-close-events-with-startdate-and-enddate/?do=findComment&comment=153189

wire()->addHookAfter('LazyCron::every30Minutes', function (HookEvent $e) {

  $closables = $e->pages->find("closed=0, enddate<now");
  foreach ($closables as $p) $p->setAndSave('closed', 1);

  $openables = $e->pages->find("closed=1, startdate<now, enddate>now");
  foreach ($openables as $p) $p->setAndSave('closed', 0);

});