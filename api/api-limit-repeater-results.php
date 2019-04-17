<?php

// your repeater with all of its items
$myRepeater = $page->repeater;

// parts of your repeater with limited items based on your selection
$myRepeaterSelection = $myRepeater->find('anotherField=value');

// do whatever you want with your repeater selection
echo count( $myRepeaterSelection );

foreach( $myRepeaterSelection as $mrs) {
    // ...
}

// same as above but way shorter
echo count( $page->repeater->find('anotherField=value') );

foreach( $page->repeater->find('anotherField=value') as $item) {
    // ...
}

?>