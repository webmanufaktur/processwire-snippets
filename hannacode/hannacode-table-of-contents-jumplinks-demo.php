
<?php namespace ProcessWire;

// Source: ProcessWire HannaCode Module page
// Author: Ryan Cramer
// URL: https://processwire.com/modules/process-hanna-code/

// HannaCode Import Code
// !HannaCode:jumplinks:eyJuYW1lIjoianVtcGxpbmtzIiwidHlwZSI6MiwiY29kZSI6IlwvKmhjX2F0dHJcbmZvcj1cImgyIGgzXCJcbmhjX2F0dHIqXC9cbiRmb3IgPSBzdHJfcmVwbGFjZSgnLCcsICcgJywgJGZvcik7XG4kZm9yID0gZXhwbG9kZSgnICcsICRmb3IpO1xuZm9yZWFjaCgkZm9yIGFzICRrID0+ICR2KSAkZm9yWyRrXSA9IHRyaW0oJHYpO1xuXG4kZm9yID0gaW1wbG9kZSgnfCcsICRmb3IpO1xuJGFuY2hvcnMgPSBhcnJheSgpOyBcbiR2YWx1ZSA9ICRoYW5uYS0+dmFsdWU7IFxuXG5pZihwcmVnX21hdGNoX2FsbCgnezwoJyAuICRmb3IgLiAnKVtePl0qPiguKz8pPFwvXFwxPn1pJywgJHZhbHVlLCAkbWF0Y2hlcykpIHtcbiAgZm9yZWFjaCgkbWF0Y2hlc1sxXSBhcyAka2V5ID0+ICR0YWcpIHtcbiAgICAkdGV4dCA9ICRtYXRjaGVzWzJdWyRrZXldO1xuICAgICRhbmNob3IgPSAkc2FuaXRpemVyLT5wYWdlTmFtZSgkdGV4dCwgdHJ1ZSk7XG4gICAgJGFuY2hvcnNbJGFuY2hvcl0gPSAkdGV4dDsgXG4gICAgJGZ1bGwgPSAkbWF0Y2hlc1swXVska2V5XTsgXG4gICAgJHZhbHVlID0gc3RyX3JlcGxhY2UoJGZ1bGwsIFwiPGEgbmFtZT0nJGFuY2hvcicgaHJlZj0nIyc+PFwvYT4kZnVsbFwiLCAkdmFsdWUpOyBcbiAgfSAgXG4gICRoYW5uYS0+dmFsdWUgPSAkdmFsdWU7IFxufVxuXG5pZihjb3VudCgkYW5jaG9ycykpIHtcbiAgZWNobyBcIjx1bCBjbGFzcz0nanVtcGxpbmtzJz5cIjtcbiAgZm9yZWFjaCgkYW5jaG9ycyBhcyAkYW5jaG9yID0+ICR0ZXh0KSB7XG4gICAgZWNobyBcIjxsaT48YSBocmVmPSckcGFnZS0+dXJsIyRhbmNob3InPiR0ZXh0PFwvYT48XC9saT5cIjtcbiAgfVxuICBlY2hvIFwiPFwvdWw+XCI7XG59IGVsc2Uge1xuICBlY2hvICcnO1xufSJ9/!HannaCode

$for = str_replace(',', ' ', $for);
$for = explode(' ', $for);
foreach ($for as $k => $v) {
    $for[$k] = trim($v);
}

$for = implode('|', $for);
$anchors = array();
$value = $hanna->value;

if (preg_match_all('{<(' . $for . ')[^>]*>(.+?)</\1>}i', $value, $matches)) {
    foreach ($matches[1] as $key => $tag) {
        $text = $matches[2][$key];
        $anchor = $sanitizer->pageName($text, true);
        $anchors[$anchor] = $text;
        $full = $matches[0][$key];
        $value = str_replace($full, "<a name='$anchor' href='#'></a>$full", $value);
    }
    $hanna->value = $value;
}

if (count($anchors)) {
    echo "<ul class='jumplinks'>";
    foreach ($anchors as $anchor => $text) {
        echo "<li><a href='$page->url#$anchor'>$text</a></li>";
    }
    echo "</ul>";
} else {
    echo '';
}
?>
