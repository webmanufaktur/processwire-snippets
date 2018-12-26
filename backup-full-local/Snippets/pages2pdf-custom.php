<?php


$time               = date('Y-m-d');
$tplPage            = $page->template->name; 
$tplRender          = "dish.php";

$pdf                = $modules->get('WirePDF');
$pdf->markupMain    = $config->paths->templates . "pages2pdf/$tplRender";

$pdf->save($config->paths->templates . 'pdfs/' . $time . '-' . $tplPage . '-' . $page->name . '.pdf');

$modules->get('Pages2Pdf')->render();
