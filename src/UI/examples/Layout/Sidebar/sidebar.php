<?php
function sidebar() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $entries = getSomeEntries($f);

    return $renderer->render([
        $f->layout()->sidebar($entries, 1)
    ]);
}

function getSomeEntries($f) {
    $entries = array();
    foreach(range(1,4) as $c){
        $planks = array($f->maincontrols()->menu()->plank());
        $slate = $f->maincontrols()->menu()->slate($planks);
        $icon = $f->icon()->standard('sidebar_trigger', '')->withSize('medium');
        $button = $f->button()->iconographic($icon->withAbbreviation('X'), "Button", '#');

        $entries[] = $f->layout()->sidebarentry($button, $slate);
    }

    $glyph = $f->glyph()->user();
    $extra_button = $f->button()->iconographic($glyph,'Extra', '#');

    $entries[] = $f->layout()->sidebarentry($extra_button);
    return $entries;
}
