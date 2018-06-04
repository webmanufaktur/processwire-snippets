<?php

// Page sub-select - find pages based on previous selected pages
// example: find all brand based on products

// define array for brands
$brands = new PageArray();

foreach($pages->find("template=productTemplate") as $product) {

	// add brand from product page to brands array
	$brands->add($product->brandField); 

};