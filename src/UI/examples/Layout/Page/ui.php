
<?php
function ui() {
	return '<a href="src/UI/examples/Layout/Page/ui.php?new_ui=1">see UI</a>';
}



if ($_GET['new_ui'] == '1') {

	chdir('../../../../../');

	require_once("Services/Init/classes/class.ilInitialisation.php");

	include_once('src/UI/examples/Layout/MetaBar/metabar.php');
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
	$sidebar = pagedemo_sidebar($f);

	$page = $f->layout()->page($content)
		->withMetabar($metabar)
		->withSidebar($sidebar)
	;

	echo $renderer->render($page);
}
