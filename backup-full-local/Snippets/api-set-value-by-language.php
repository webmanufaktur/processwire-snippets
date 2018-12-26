<?php

// Option 1

$user->language = $languages->get('en');
$page->setAndSave('title', 'My title');

$user->language = $languages->get('de');
$page->setAndSave('title', 'Mein Titel');

// Option 2

$page->of(false);
$page->title->setLanguageValue($languages->get('en'), 'My title');
$page->title->setLanguageValue($languages->get('de'), 'Mein Titel');
$page->save();

