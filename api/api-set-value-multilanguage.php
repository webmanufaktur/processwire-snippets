<?php

// Set multi-language value via API

// Option 1
$user->language = $languages->get('en');
$page->setAndSave('title', 'My title');

$user->language = $languages->get('de');
$page->setAndSave('title', 'Mein Titel');

// Option 2

// http://cheatsheet.processwire.com/page/built-in-methods-reference/page-setoutputformatting-true-false/
$page->of(false);
$page->title->setLanguageValue($languages->get('en'), 'My title');
$page->title->setLanguageValue($languages->get('de'), 'Mein Titel');


// save page
$page->save();

