<?php

// INSERT IN CONFIG.PHP

$config->sessionAllow = function($session) {

    // if there is a session cookie, chances are user is logged in
    if($session->hasCookie()) {
        return true;
    }

    // if requested URL is an admin URL, allow session
    if(strpos($_SERVER['REQUEST_URI'], $session->config->urls->admin) === 0) {
        return true;
    }

    // otherwise disallow session
    return false;
    
};