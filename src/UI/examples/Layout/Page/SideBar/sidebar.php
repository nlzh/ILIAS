<?php

function sidebar() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$icon = $f->icon()->standard('sidebar_trigger', 'Example')->withSize('medium');

	$planks1 = array(
		$f->maincontrols()->menu()->plank($f->legacy("Plank 1")),
		$f->maincontrols()->menu()->plank($f->legacy("Plank 2"))
	);
	$slate1 =$f->maincontrols()->menu()->slate($planks1);
	$button1 = $f->button()->iconographic($icon->withAbbreviation('I'), 'Button1', '#')
		->withOnClick($slate1->getToggleSignal());

	$planks2 = array(
		$f->maincontrols()->menu()->plank($f->legacy("Plank 3")),
		$f->maincontrols()->menu()->plank($f->legacy("Plank 4"))
	);
	$slate2 =$f->maincontrols()->menu()->slate($planks2);
	$button2 = $f->button()->iconographic($icon->withAbbreviation('II'), 'Button2', '#')
		->withOnClick($slate2->getToggleSignal());


	$planks3 = array(
		$f->maincontrols()->menu()->plank($f->legacy("Plank 5")),
		$f->maincontrols()->menu()->plank($f->legacy("Plank 6"))
	);
	$slate3 =$f->maincontrols()->menu()->slate($planks3);
	$button3 = $f->button()->iconographic($icon->withAbbreviation('III'), 'Button3', '#')
		->withOnClick($slate3->getToggleSignal());


	$extra_button = $f->button()->iconographic($icon->withAbbreviation('E'), 'Extra', '#');

	$buttons = array($button1, $button2, $button3, $extra_button);
	$slates = array($slate1, $slate2, $slate3);


	$sidebar = $f->layout()->page()->sidebar($buttons, $slates);

	return $renderer->render($sidebar);
}
