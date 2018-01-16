<?php

function buildSidebar($f) {
    include_once('src/UI/examples/MainControls/Menu/Plank/plank.php');
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
        $id = 'entry' .$c;
        $sidebar = $sidebar->withEntry($id, $button, $slate);
    }

    $glyph = $f->glyph()->user();
    $extra_button = $f->button()->iconographic($glyph,'Extra', '#');
    $sidebar = $sidebar->withEntry('EXTRA', $extra_button);

    return $sidebar;
}

function sidebar() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $sidebar = buildSidebar($f);
    return $renderer->render($sidebar);
}
