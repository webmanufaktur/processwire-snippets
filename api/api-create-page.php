<?php

// Create new page via API
$newpage = new Page();

// http://cheatsheet.processwire.com/page/built-in-methods-reference/page-setoutputformatting-true-false/
$newpage->setOutputFormatting(false);

// example template
$newpage->template = 'yourTemplate';

// example parent
$newpage->parent = wire('pages')->get('/parent/'); 

// example name - leave empty and let ProcessWire create a name for the page based on title
$newpage->name = "foo";

//example title
$newpage->title = "My API-generated new PW page";

// example field with example value
$newpage->fieldname = "my field value"; 

// save page
$newpage->save();