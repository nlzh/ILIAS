<?php
include_once('z_auxilliary.php');

function ui()
{
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$url = 'src/UI/examples/Layout/Page/Standard/ui.php?new_ui=1';
	$btn = $f->button()->standard('See UI in fullscreen-mode', $url);
	return $renderer->render($btn);
}


if ($_GET['new_ui'] == '1') {
	_initIliasForPreview();
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$crumbs = array (
		$f->link()->standard("entry1", '#'),
		$f->link()->standard("entry2", '#'),
		$f->link()->standard("entry3", '#'),
		$f->link()->standard("entry4", '#')
	);
	$breadcrumbs = $f->breadcrumbs($crumbs);

	$logo = $f->image()
		->responsive("src/UI/examples/Image/HeaderIconLarge.svg", "ILIAS");

	$content = pagedemoContent($f);
	$metabar = buildMetabar($f);
	$mainbar = buildMainbar($f, $renderer);
	if($_GET['mbactive']) {
		$mainbar = $mainbar->withActive($_GET['mbactive']);
	}

	$page = $f->layout()->page()->standard(
		$metabar,
		$mainbar,
		$content,
		$breadcrumbs,
		$logo
	);

	echo $renderer->render($page);
}

if ($_GET['slate_contents']) {
	_initIliasForPreview();
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$symbol = $f->icon()->custom('./src/UI/examples/Layout/Page/Standard/user.svg', '')->withSize('small');
	if($_GET['slate_contents'] == '1') {
		$slate = $f->maincontrols()->slate()->legacy('Replaced', $symbol, 'This is replaced content.')
			->withBacklink('Back', './src/UI/examples/Layout/Page/Standard/ui.php?slate_contents=2');
	}
	if($_GET['slate_contents'] == '2') {
		$slate = $f->maincontrols()->slate()->combined('Replace Content', $symbol, 'replace again');
		$slate = $slate
			->withAdditionalEntry(
				$f->button()->bulky($symbol, 'Replace whole Slate', '#')
				->withOnClick(
					$slate->getReplaceContentSignal()
						->withAsyncRenderUrl('./src/UI/examples/Layout/Page/Standard/ui.php?slate_contents=1')
				)
			);
	}

	echo $renderer->renderAsync($slate);
	exit();
}
