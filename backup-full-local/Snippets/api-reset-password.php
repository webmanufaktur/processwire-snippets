<?php

$u = $users->get('admin'); // or whatever your username is
$u->of(false); 
$u->pass = 'your-new-password';
$u->save();

