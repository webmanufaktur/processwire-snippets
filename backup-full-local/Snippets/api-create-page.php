<?php

// Create new page via API

$newpage = new Page();
$newpage->setOutputFormatting(false);
$newpage->template = 'your_template'; // example template
$newpage->parent = wire('pages')->get('/parent/'); // example parent
$newpage->name = "foo"; // example name
$newpage->title = "My API-generated new PW page";
$newpage->fieldname = "my field value"; // example field with example value
$newpage->save();