<?php

function sidebar() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$icon = $f->icon()->standard('someExample', 'Example')->withSize('medium');
	$button1 = $f->button()->iconographic($icon->withAbbreviation('I'), 'Button1', '#');
	$button2 = $f->button()->iconographic($icon->withAbbreviation('II'), 'Button2', '#');
	$button3 = $f->button()->iconographic($icon->withAbbreviation('III'), 'Button3', '#');

	$planks1 = array(
		$f->maincontrols()->menu()->plank($f->legacy("Plank 1")),
		$f->maincontrols()->menu()->plank($f->legacy("Plank 2"))
	);
	$planks2 = array(
		$f->maincontrols()->menu()->plank($f->legacy("Plank 3")),
		$f->maincontrols()->menu()->plank($f->legacy("Plank 4"))
	);

	$slates = array(
		$f->maincontrols()->menu()->slate($button1, $planks1),
		$f->maincontrols()->menu()->slate($button2, $planks2),
		$f->maincontrols()->menu()->slate($button3, $planks1),
		$f->maincontrols()->menu()->slate($button1, $planks2),
	);


	$sidebar = $f->layout()->page()->sidebar($slates);

	return $renderer->render($sidebar);
}
