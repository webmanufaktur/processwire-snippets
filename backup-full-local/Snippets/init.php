<?php

$homepage = $pages->get('/'); 

$settings = $pages->get('template=settings');

$title = $page->get('seotitle|headline|title');

$headline = $page->get('headline|title');

$robots = $page->get('seorobots')->value;

$desc = $page->get('seodesc');

// https://github.com/dragan1700/pw/blob/master/init.inc

$lang = $user->language->name; // e.g. "default" or "en"

if($lang == 'default') {
	$htmlLang = 'de';
	$homeURL = $config->urls->root;
	$addtocart = "Zur Liste hinzufügen";
}
if($lang == 'en') {
	$htmlLang = $lang;
	$homeURL = $config->urls->root . 'en/';
	$addtocart = "Add to list";
}