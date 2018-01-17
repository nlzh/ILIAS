<?php

function buildSidebar($f) {
    include_once('src/UI/examples/MainControls/Menu/Plank/plank.php');

    $entries = array();

    foreach(range(1,4) as $c){
        //build planks and slate
        $planks = array(
            buildPlank($f),
            buildPlank($f),
            buildPlank($f)
        );
        $slate =$f->maincontrols()->menu()->slate($planks);

        //triggerer
        $icon = $f->icon()->standard('sidebar_trigger', '')->withSize('medium');
        $button = $f->button()->iconographic($icon->withAbbreviation('X'), "Button $i", '#');
        $entries[] = $f->layout()->sidebarentry($button, $slate);
    }


    $glyph = $f->glyph()->user();
    $extra_button = $f->button()->iconographic($glyph,'Extra', '#');

    $entries[] = $f->layout()->sidebarentry($extra_button);
    return $f->layout()->sidebar($entries, 2);

}

function sidebar() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $sidebar = buildSidebar($f);
    return $renderer->render($sidebar);
}
