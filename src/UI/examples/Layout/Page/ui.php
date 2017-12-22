
<?php
function ui() {
	return '<a href="src/UI/examples/Layout/Page/ui.php?new_ui=1">see UI</a>';
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


$content = $f->legacy("some content<br>some content<br>some content<br>x.");

$page = $f->layout()->page($content)

	->withMetabar(buildMetabar($f))
	->withSidebar(buildSidebar($f))
;

echo $renderer->render($page);
}
