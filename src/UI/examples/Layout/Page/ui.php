
<?php
include_once('z_auxilliary.php');

function ui() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $url = 'src/UI/examples/Layout/Page/ui.php?new_ui=1';
    $btn = $f->button()->standard('See UI in fullscreen-mode', $url);
    return $renderer->render($btn);
}



if ($_GET['new_ui'] == '1') {

    chdir('../../../../../');

    require_once("Services/Init/classes/class.ilInitialisation.php");

    include_once('src/UI/examples/Layout/Metabar/metabar.php');
    include_once('src/UI/examples/Layout/Page/page.php');
    ilInitialisation::initILIAS();

    global $ilCtrl, $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    if($_GET['rpc']) {
        handleRPC($f, $renderer);
    }

    $content = array();
    $content[] = $f->panel()->standard(
        'Demo Content',
        $f->legacy("some content<br>some content<br>some content<br>x.")
    );
    $content[] = $f->panel()->standard(
        'Demo Content 2',
        $f->legacy("some content<br>some content<br>some content<br>x.")
    );


    $metabar = buildMetabar($f);
    $sidebar = pagedemoSidebar($f);

    $page = $f->layout()->page($content)
        ->withMetabar($metabar)
        ->withSidebar($sidebar)
    ;

    echo $renderer->render($page);
}
