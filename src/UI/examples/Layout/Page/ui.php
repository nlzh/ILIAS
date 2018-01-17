
<?php
function ui() {
	return '<a href="src/UI/examples/Layout/Page/ui.php?new_ui=1">see UI</a>';
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


if ($_GET['new_ui'] == '1') {

	chdir('../../../../../');

	require_once("Services/Init/classes/class.ilInitialisation.php");

	include_once('src/UI/examples/Layout/MetaBar/metabar.php');
	include_once('src/UI/examples/Layout/SideBar/sidebar.php');
	ilInitialisation::initILIAS();

	global $ilCtrl, $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

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
	$sidebar = buildSidebar($f);

    //tree in plank
    $glyph = $f->glyph()->settings();
    $button = $f->button()->iconographic($glyph,'Tree', '#');
    $slate = $f->maincontrols()->menu()->slate(array(buildTreePlank($f)));
    //$sidebar = $sidebar->withEntry($button, $slate);


	$page = $f->layout()->page($content)
		->withMetabar($metabar)
		->withSidebar($sidebar)
	;

	echo $renderer->render($page);
}
