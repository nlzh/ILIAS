<?php

function sidebar() {
	//Init Factory and Renderer
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$icon = $f->icon()->standard('someExample', 'Example')->withSize('medium');
	$button1 = $f->button()->iconographic($icon->withAbbreviation('I'), 'Button1', '#');

	$button2 = $f->button()->iconographic($icon->withAbbreviation('II'), 'Button2', '#');

	$planks = array(
		$f->maincontrols()->menu()->plank(),
		$f->maincontrols()->menu()->plank()
	);

	$slates = array(
		$slate = $f->maincontrols()->menu()->slate($button1, $planks),
		$slate = $f->maincontrols()->menu()->slate($button2, $planks)
	);


	$sidebar = $f->layout()->page()->sidebar($slates);

	return $renderer->render($sidebar);
}
