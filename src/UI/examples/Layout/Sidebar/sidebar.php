<?php

function buildSidebar($f) {
    include_once('src/UI/examples/MainControls/Menu/Plank/plank.php');

    $entries = array();

    foreach(range(1,4) as $c){
        //build planks and slate
        $planks = array(
            buildPlank($f),
            buildPlank($f)
        );
        $slate = $f->maincontrols()->menu()->slate($planks);

        $replace_signal = $slate->getReplaceContentSignal();
        $button = $f->button()->standard('replace content', '#')->withOnClick($replace_signal);
        $plank = $f->maincontrols()->menu()->plank()->withContents([
            $f->legacy('<h1>replace</h1>'),
            $f->legacy('this will replace the contents of the entire slate'),
            $button
        ]);
        $slate = $slate->withPlanks($plank);

        //triggerer
        $icon = $f->icon()->standard('sidebar_trigger', '')->withSize('medium');
        $button = $f->button()->iconographic($icon->withAbbreviation('X'), "Button", '#');
        $entries[] = $f->layout()->sidebarentry($button, $slate);
    }
/*
    $icon = $f->icon()->standard('sidebar_trigger', '')->withSize('medium');
    $button = $f->button()->iconographic($icon->withAbbreviation('X'), "Tree", '#');
    $slate = $f->maincontrols()->menu()->slate([buildTreePlank($f)]);
    $entries[] = $f->layout()->sidebarentry($button, $slate);
*/


    $glyph = $f->glyph()->user();
    $extra_button = $f->button()->iconographic($glyph,'Extra', '#');

    $entries[] = $f->layout()->sidebarentry($extra_button);
    return $f->layout()->sidebar($entries, 2);

}


function buildTreePlank($f) {
    include_once ("./Services/Repository/classes/class.ilRepositoryExplorer.php");
    global $DIC;
    $tree = $DIC->repositoryTree();
    $top_node = 0;

    $exp = new ilRepositoryExplorer("ilias.php?baseClass=ilRepositoryGUI&amp;cmd=goto", $top_node);
    $exp->setExpandTarget('src/UI/examples/Layout/Page/ui.php?new_ui=1');
    //$exp->setUseStandardFrame(false);
    //$exp->setFrameUpdater("tree", "updater");
    //$exp->setTargetGet("ref_id");
    $expanded = $tree->readRootId();
    $exp->setExpand($expanded);
    $exp->setOutput(0, 1, 0);
    $out =  $exp->getOutput(false);

    return $f->maincontrols()->menu()->plank()
        ->withContents([$f->legacy($out)]);
}




function sidebar() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $sidebar = buildSidebar($f);
    return $renderer->render($sidebar);
}
