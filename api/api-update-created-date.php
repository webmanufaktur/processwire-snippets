<?php

// Update created date via API

// define new date
$page->created = $timestamp

// save page - yeah, a different way of saving a page
// necessary in this case
$page->save(array('quiet' => true))