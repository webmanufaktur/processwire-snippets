<?php

$pages->addHookBefore('saveReady', function($event) {
    
        $page = $event->arguments[0];
    
        if($page->template == 'location') {
    
            if ( empty($page->street) || empty($page->city) ) {
                return;
            }
    
            // Get address
            $address = $page->street . ', ' . $page->zip . ' ' . $page->city . ', ' . $page->country;
    
            // Get JSON results from this request
            $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=false');
    
            $geo = json_decode($geo, true);
    
            if ($geo['status'] == 'OK') {
                $page->latlong->lat = $geo['results'][0]['geometry']['location']['lat'];
                $page->latlong->long = $geo['results'][0]['geometry']['location']['lng'];
                $this->message('Saved for: ' . $geo['results'][0]['formatted_address']);
            } else {
                $this->error('Error msg...');
            }
        }
    });