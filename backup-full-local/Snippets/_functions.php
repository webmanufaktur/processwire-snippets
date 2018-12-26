<?php namespace ProcessWire;

// wire('log')->save('debug', '_functions.php');

function listingKurseEnsembles($p, $o) {
    return join(' und ', array_filter(array_merge(array(join(', ', array_slice(wire('pages')->get("id=$p")->$o->explode('title'), 0, -1))), array_slice(wire('pages')->get("id=$p")->$o->explode('title'), -1)), 'strlen'));
};

function dozentin($p) {
    return (wire('pages')->get("id=$p")->anrede == '1') ? 'Dozentin' : 'Dozent';
}

function ersie($p) {
    return (wire('pages')->get("id=$p")->anrede == '1') ? 'Sie' : 'Er';
}

function generateSeoTitle($p, $t) {

    $pages = wire('pages');
    $page = $pages->get("id=$p");

    $ersie = ersie($p);
    $dozentin = dozentin($p);
    $kurse = listingKurseEnsembles($p, 'kurs');
    $ensembles = listingKurseEnsembles($p, 'ensemble');

    // VORNAME NACHNAME ist DOZENT/IN für INSTRUMEKURSE an der Musikschule Neumünster. 
    // echo $page->title . " ist " . $dozentin . " für " . $kurse . ".";

    if($t == "dozent") {
        echo "{$page->title} ist {$dozentin} für {$kurse}. {$ersie}";
    }

};

// <div style="background: #fff; padding: 60px;">
// if($page->template == "dozent") { generateSeoTitle($page->id, $page->template->name); };
// </div>




// wire('log')->save('debug', '_init.php');


// Globale Funktionen
//include_once('./_functions.php');

function generateSeoTitle($p) {

    $pages = wire('pages');
    $page = $pages->get("id=$p");

    // ab hier für Dozenten-Seiten
    if($page->template->name == 'dozent') {

        // sind Instrumente und Kurse hinterlegt?
        if(count($page->kurs) > 0) {

            $pt = $page->title;
            $ps = ($page->anrede == '1') ? 'Dozentin' : 'Dozent';
            $pk = $page->kurs->explode('title'); // ->implode(', ', 'title');

            $pk2 = join(' und ', array_filter(array_merge(array(join(', ', array_slice($pk, 0, -1))), array_slice($pk, -1)), 'strlen'));
            $pagetitle = "{$pt} - {$ps} für {$pk2} an der Musikschule Neumünster";
            $gpd = "{$ps} {$pt} unterrichtet {$pk2} an der Musikschule Neumünster.";

            return $pagetitle; // = $gpt;
            //$pagedesc = $gpd;

        // sind Ensembles hinterlegt?
        } else if(count($page->ensemble) > 0) {

            $pt = $page->title;
            $ps = ($page->anrede == '1') ? 'Ensemble-Leiterin' : 'Ensemble-Leiter';
            $pk = $page->ensemble->explode('title'); // ->implode(', ', 'title');

            $pk2 = join(' und ', array_filter(array_merge(array(join(', ', array_slice($pk, 0, -1))), array_slice($pk, -1)), 'strlen'));
            $gpt = "{$pt} - {$ps} des Ensembles {$pk2} an der Musikschule Neumünster";
            $gpd = "{$pt} - {$ps} des Ensembles {$pk2} an der Musikschule Neumünster";

            return $pagetitle = $gpt; 
            $pagedesc = $gpd;

        // keine Instrumente, Kurse oder Ensembles?
        } else {

            return $pagetitle = $page->get('headline|title');
            $pagedesc = "";

        };

    // ab hier für die Dozenten-Übersicht
    } else if($page->template->name == 'dozenten') {
            
            $gpt = "Die {$dozentenCount} Dozentinnen und Dozenten der Musikschule Neumünster stellen sich vor";
            $pagetitle = $gpt;
            $pagedesc = "";

    // ab hier für Intrumenten- und Kurs-Seiten
    } else if($page->template->name == 'kurs') {

        if($page->instrumentkurs == "1") {

            $dc = (count($page->dozent) > 1) ? 'Dozenten' : 'Dozent';
            $dcc = count($page->dozent);

            $gpt = "Musikunterricht {$page->title}: {$page->title} lernen in Neumünster ({$dcc} {$dc})";

            // INSTRUMENT lernen (ANZAHL Dozenten) | Musikschule Neumünster
            $pagetitle = $gpt; 
            $pagedesc = "";

        } else {
            
            // INSTRUMENT lernen (ANZAHL Dozenten) | Musikschule Neumünster
            $dc = (count($page->dozent) > 1) ? 'Dozenten' : 'Dozent';
            $dcc = count($page->dozent);

            $gpt = "Kurs für {$page->title} an der Musikschule Neumünster ({$dcc} {$dc})";

            // INSTRUMENT lernen (ANZAHL Dozenten) | Musikschule Neumünster
            $pagetitle = $gpt;
            $pagedesc = ""; 

        };

    // ab hier für die Kurs/Instrumenten-Übersicht
    } else if($page->template->name == 'kurse') {
                
        $gpt = "Alle {$instrumentekurseCount} Instrumente und Kurse der Musikschule Neumünster";
        $pagetitle = $gpt;
        $pagedesc = "";

    // ab hier für die Ensemble-Übersicht
    } else if($page->template->name == 'ensembles') {
                    
        $gpt = "Alle {$ensemblesCount} Ensembles der Musikschule Neumünster";
        $pagetitle = $gpt;
        $pagedesc = "";

    // ab hier für die Ensemble-Übersicht
    } else if($page->template->name == 'events') {
                        
        $gpt = "Termine und Veranstaltungsempfehlungen der Musikschule Neumünster ({$eventsCount} Einträge)";
        $pagetitle = $gpt;
        $pagedesc = "";

    // ab hier für die Startseite
    } else if($page->template == 'home') {

        $gpt = "Musikschule Neumünster – {$dozentenCount} Dozenten, {$instrumentekurseCount} Instrumente, {$ensemblesCount} Ensembles";

        echo $pagetitle = $gpt; 
        $pagedesc = "";

    } else {

        $pagetitle = $page->get('headline|title');
        $pagedesc = "";

    };

};

