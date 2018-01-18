<?php

function page() {
    include_once('src/UI/examples/Layout/MetaBar/metabar.php');

    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $content = $f->legacy("some content");

    $page = $f->layout()->page($content)
        ->withMetabar(buildMetabar($f))
        ->withSidebar(pagedemo_sidebar($f))
        ;

    return $renderer->render($page);
}

function pagedemo_sidebar($f) {

    $icon = $f->icon()->custom('./src/UI/examples/Layout/Page/icon-sb-cockpit.svg', '');
    $btn = $f->button()->iconographic($icon->withSize('large'), "Button 1", '#');
    $slate = $f->maincontrols()->menu()->slate(array()); //remove constructor-planks
    $replace_signal = $slate->getReplaceContentSignal();
    $slate = $slate->withPlanks(pagedemo_planks1($f, $replace_signal));
    $entries[] = $f->layout()->sidebarentry($btn, $slate);

    $icon = $f->icon()->custom('./src/UI/examples/Layout/Page/icon-sb-navigation.svg', '');
    $btn = $f->button()->iconographic($icon->withSize('large'), "Button 2", '#');
    $slate = $slate->withResetSignals();
    $replace_signal = $slate->getReplaceContentSignal();
    $slate = $slate->withPlanks(pagedemo_planks2($f, $replace_signal));
    $entries[] = $f->layout()->sidebarentry($btn, $slate);

    $icon = $f->icon()->custom('./src/UI/examples/Layout/Page/icon-sb-search.svg', '');
    $btn = $f->button()->iconographic($icon->withSize('large'), "Button 3", '#');
    $slate = $slate->withResetSignals();
    $replace_signal = $slate->getReplaceContentSignal();
    $slate = $slate->withPlanks(pagedemo_planks3($f, $replace_signal));
    $entries[] = $f->layout()->sidebarentry($btn, $slate);

    $icon = $f->icon()->custom('./src/UI/examples/Layout/Page/icon-sb-help.svg', '');
    $btn = $f->button()->iconographic($icon->withSize('large'), "Button 4", '#');
    $slate = $slate->withResetSignals();
    $replace_signal = $slate->getReplaceContentSignal();
    $slate = $slate->withPlanks(pagedemo_planks4($f, $replace_signal));
    $entries[] = $f->layout()->sidebarentry($btn, $slate);

    $icon = $f->icon()->custom('./src/UI/examples/Layout/Page/icon-sb-more.svg', '');
    $btn = $f->button()->iconographic($icon->withSize('large'), "More", '#');
    $slate = $slate->withResetSignals();
    $replace_signal = $slate->getReplaceContentSignal();
    $slate = $slate->withPlanks(pagedemo_planks5($f, $replace_signal));
    $entries[] = $f->layout()->sidebarentry($btn, $slate);

    return $f->layout()->sidebar($entries);
}


function pagedemo_planks1($f, $replacesignal){
    $planks = array();
    $planks[] = $f->maincontrols()->menu()->plank()->withContents([
            $f->legacy('some content'),
            $f->legacy('in a slate')
        ]);

    return $planks;
}

function pagedemo_planks2($f, $replacesignal){
    $planks = array();
    $planks[] = $f->maincontrols()->menu()->plank()->withContents([
            $f->legacy('some other content'),
            $f->legacy('in a slate')
        ]);
    $planks[] = $f->maincontrols()->menu()->plank()->withContents([
            $f->legacy('here is another plank')
        ]);
    return $planks;
}


function pagedemo_planks3($f, $replacesignal){
    $planks = array();
    $planks[] = $f->maincontrols()->menu()->plank()->withContents([
        $f->legacy('planks - 3')
    ]);
    return $planks;
}
function pagedemo_planks4($f, $replacesignal){
    $planks = array();
    $planks[] = $f->maincontrols()->menu()->plank()->withContents([
        $f->legacy('planks - 4')
    ]);
    return $planks;
}
function pagedemo_planks5($f, $replacesignal){
    $planks = array();
    $planks[] = $f->maincontrols()->menu()->plank()->withContents([
        $f->legacy('planks - 5')
    ]);
    return $planks;
}