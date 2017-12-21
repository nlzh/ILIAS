<?php

function page() {
    include('src/UI/examples/Layout/MetaBar/metabar.php');

    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $content = $f->legacy("some content");

    $page = $f->layout()->page($content)
        ->withMetabar(buildMetabar($f))
        ->withSidebar(page_getSidebar($f))
        ;

    return $renderer->render($page);
}



function page_getSidebar($f) {
    $mf = $f->maincontrols()->menu();

    $icon = $f->icon()->standard('sidebar_trigger', 'Example')
        ->withSize('medium');

    $sidebar = $f->layout()->sidebar();

    foreach(range(1,4) as $c){
        $i = (string)$c;
        $plank = $f->maincontrols()->menu()->plank()
            ->withTitle('a title - ' .$c);

        $plank2 = $plank
            ->withElement($f->legacy('some element'))
            ->withElement($plank)
            ->withElement(
                $plank->withElement($plank)
            );

        $planks = array(
            $plank, $plank2
        );

        $slate =$mf->slate($planks);
        $button = $f->button()->iconographic($icon->withAbbreviation($i), "Button $i", '#');
        $sidebar = $sidebar->withEntry($button, $slate);
    }

    $extra_button = $f->button()->iconographic($icon->withAbbreviation('E'), 'Extra', '#');
    $sidebar = $sidebar->withEntry($extra_button);

    return $sidebar;
}


