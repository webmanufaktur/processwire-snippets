<?php

    // Create a new SUPERUSER
    // tested successfully with ProcessWire 3.0.104

    $newadmin = new User();
    // http://cheatsheet.processwire.com/page/built-in-methods-reference/page-setoutputformatting-true-false/
    $newadmin->of(false);
    $newadmin->name = "newCmsAdminUser";
    $newadmin->email = "user@domain.tld";
    $newadmin->pass = "aSecurePasswordHere";
    $newadmin->addRole("superuser");
    $newadmin->save();
    $newadmin->of(true);

?>