<?php namespace ProcessWire;

// include ProcessWire's bootstrap file
// require_once './index.php';

// get the parent page
$parent = $pages->get(1020);

// set the template for the new pages
$template = 'dish';

// echo "Creating pages now... <br><br>";
// echo time() . "<br>";
// echo date("H:i:s", time()) . "<br>";

for ($i = 1; $i < 10001; $i++) {
    // create a new page
    $np = new Page();
    $np->setOutputFormatting(false);
    $np->template = $template;
    $np->parent = $parent;
    $np->title = "abs-" . time() * $i;
    // save the page
    $np->save();
}

// echo "Done creating pages!" . "<br>";
// echo time() . "<br>";
// echo date("H:i:s", time()) . "<br>";
// $deleteme = $pages->findMany("template=dish");
// // $deleteme = $pages->findRaw("template=dish, limit=10", 'id, title');
// foreach ($deleteme as $np) {
//     // create a new page
//     // $pages->delete($np);
//     $np->trash();
// }
// var_dump($deleteme);
