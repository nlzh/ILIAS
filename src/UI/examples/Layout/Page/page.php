<?php

include_once('z_auxilliary.php');
include_once('src/UI/examples/Layout/Metabar/metabar.php');

function page() {

    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    if($_GET['rpc']) {
        handleRPC($f, $renderer);
    }

    $content = $f->legacy("some content");

    $page = $f->layout()->page($content)
        ->withMetabar(buildMetabar($f))
        ->withSidebar(pagedemoSidebar($f))
        ->withHeaders(false);
        ;

    return $renderer->render($page);
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
