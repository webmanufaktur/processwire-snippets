<?php namespace ProcessWire;

// Source: ProcessWire Community Forum
// Author: Robin S
// URL: https://processwire.com/talk/topic/26311-prepend-a-repeater-itemsolved/?do=findComment&comment=218568

$thatPage->of(false);
$newItem = $thatPage->my_repeater->getNew();
$newItem->foo = 'bar';
$newItem->save();
$thatPage->my_repeater->add($newItem);
$thatPage->save();
// Set the sort value of the new item to 0 and adjust sibling sort values
$pages->sort($newItem, 0);
