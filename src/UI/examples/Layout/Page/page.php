<?php

function page() {
    include('src/UI/examples/Layout/MetaBar/metabar.php');
    include('src/UI/examples/Layout/SideBar/sidebar.php');

    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $content = $f->legacy("some content");

    $page = $f->layout()->page($content)
        ->withMetabar(buildMetabar($f))
        ->withSidebar(buildSidebar($f))
        ;

    return $renderer->render($page);
}
