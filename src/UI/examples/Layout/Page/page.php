<?php

function page() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$content = $f->legacy("some content");

	$page = $f->layout()->page($content)
		->withMetabar(page_getMetabar($f))
		->withSidebar(page_getSidebar($f))
		;

	return $renderer->render($page);
}


function page_getMetabar($f) {
	$metabar = $f->layout()->metabar();
	return $metabar;
}

function page_getSidebar($f) {
	$mf = $f->maincontrols()->menu();

	$icon = $f->icon()->standard('sidebar_trigger', 'Example')
		->withSize('medium');

	$sidebar = $f->layout()->sidebar();

	foreach(range(1,4) as $c){
		$i = (string)$c;
		$planks = array(
			$mf->plank($f->legacy("Plank 1 - $i")),
			$mf->plank($f->legacy("Plank 2 - $i"))
		);
		$slate =$mf->slate($planks);
		$button = $f->button()->iconographic($icon->withAbbreviation($i), "Button $i", '#');
		$sidebar = $sidebar->withEntry($button, $slate);
	}

	$extra_button = $f->button()->iconographic($icon->withAbbreviation('E'), 'Extra', '#');
	$sidebar = $sidebar->withEntry($extra_button);

	return $sidebar;
}
