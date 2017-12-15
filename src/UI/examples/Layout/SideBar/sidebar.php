<?php

function sidebar() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$mf = $f->maincontrols()->menu();
	$renderer = $DIC->ui()->renderer();

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

	return $renderer->render($sidebar);
}
