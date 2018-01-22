<?php

function page() {
    include_once('src/UI/examples/Layout/Metabar/metabar.php');

    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    if($_GET['rpc']) {
        handleRPC($f, $renderer);
    }

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

function handleRPC($f, $renderer) {
    $counter = $_GET['rpc'];
    $nu_cnt = (int)$counter + 1;
    $url = str_replace('&rpc=' .$counter, '&rpc=' .$nu_cnt, $_SERVER['REQUEST_URI']);

    $sig_id = $_GET['replaceSignal'];
    $replace_signal = new \ILIAS\UI\Implementation\Component\Popover\ReplaceContentSignal($sig_id);
    $replace_signal = $replace_signal->withAsyncRenderUrl($url);

    $btn = $f->button()->standard('Replace Contents', '#')
    ->withOnClick($replace_signal);

    $contents = $f->maincontrols()->menu()->plank()->withContents([
        $f->legacy('remote content'),
        $f->legacy('in depth ' .$counter),
        $btn
    ]);
    echo $renderer->renderAsync($contents);
    exit();
}

function pagedemo_planks1($f, $replacesignal){
    $planks = array();

    $signal_id = $replacesignal->getId();
    $signal = $replacesignal->withAsyncRenderUrl(
       $_SERVER['REQUEST_URI']
        .'&replaceSignal='. $signal_id
        .'&rpc=1'
    );
    $btn = $f->button()->standard('Replace Contents', '#')
        ->withOnClick($signal);

    $planks[] = $f->maincontrols()->menu()->plank()->withContents([
        $f->legacy('some content'),
        $f->legacy('in a slate'),
        $btn
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

    $signal_id = $replacesignal->getId();
    $signal = $replacesignal->withAsyncRenderUrl(
       $_SERVER['REQUEST_URI']
        .'&replaceSignal='. $signal_id
        .'&rpc=1'
    );
    $btn = $f->button()->standard('Replace Contents of slate 2', '#')
        ->withOnClick($signal);

    $planks[] = $f->maincontrols()->menu()->plank()->withContents([$btn]);

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
    foreach(range(1,3) as $c){
        $planks[] = $f->maincontrols()->menu()->plank()->withContents([
            $f->button()->standard('button', '#'),
            $f->button()->standard('button', '#'),
            $f->button()->standard('button', '#'),
            $f->button()->standard('button', '#'),
            $f->button()->standard('button', '#'),
            $f->button()->standard('button', '#'),
        ]);
    }
    return $planks;
}
function pagedemo_planks5($f, $replacesignal){
    $planks = array();
    $planks[] = $f->maincontrols()->menu()->plank()->withContents([
        $f->legacy('planks - 5'),
        $f->legacy('These are long planks to demonstarte scrolling')
    ]);
    foreach(range(1,12) as $c){
        $planks[] = $f->maincontrols()->menu()->plank()->withContents([
            $f->legacy('plankitem'),
            $f->legacy('plankitem'),
            $f->legacy('plankitem'),
            $f->legacy('plankitem'),
            $f->legacy('plankitem'),
            $f->legacy('plankitem'),
        ]);
    }
    return $planks;
}