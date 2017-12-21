<?php

function buildSidebar($f) {
    include('src/UI/examples/MainControls/Menu/Plank/plank.php');
    $mf = $f->maincontrols()->menu();

    //init sidebar
    $sidebar = $f->layout()->sidebar();

    foreach(range(1,4) as $c){
        //build planks and slate
        $i = (string)$c;
        $planks = array(
            buildSubPlanks($f)->withTitle("Plank $i - 1"),
            buildSimplePlank($f)->withTitle("Plank $i - 2"),
            buildSubPlanks($f)->withTitle("Plank $i - 3"),
        );
        $slate =$mf->slate($planks);

        //triggerer
        $icon = $f->icon()->standard('sidebar_trigger', '')->withSize('medium');
        $button = $f->button()->iconographic($icon->withAbbreviation($i), "Button $i", '#');

        //add to bar
        $sidebar = $sidebar->withEntry($button, $slate);
    }

    return $sidebar;
}


function sidebar() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $sidebar = buildSidebar($f);

    $icon = $f->icon()->standard('sidebar_trigger', '')->withSize('medium')->withAbbreviation('E');
    $extra_button = $f->button()->iconographic($icon,'Extra', '#');
    $sidebar = $sidebar->withEntry($extra_button);

    return $renderer->render($sidebar);
}
