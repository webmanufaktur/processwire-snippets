<?php

    // reset password for user via API

    // define username for that guy who forgot his password
    $thatGuyWhoForgotHisPassword = $users->get('yourUsername'); 

    //http://cheatsheet.processwire.com/page/built-in-methods-reference/page-setoutputformatting-true-false/
    $thatGuyWhoForgotHisPassword->of(false); 

    // set new password
    $thatGuyWhoForgotHisPassword->pass = 'your-new-super-secret-password-1111-elf';

    // save user
    $thatGuyWhoForgotHisPassword->save();

