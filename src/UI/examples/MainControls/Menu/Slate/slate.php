<?php

function slate() {
	//Init Factory and Renderer
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$icon = $f->icon()->standard('someExample', 'Example');
	$icon = $icon->withAbbreviation('I')->withSize('medium');
	$button = $f->button()->iconographic($icon, 'trigger slate', '#');

	$planks = array(
		$f->maincontrols()->menu()->plank(),
		$f->maincontrols()->menu()->plank(),
		$f->maincontrols()->menu()->plank()
	);

	$slate = $f->maincontrols()->menu()->slate($button, $planks);

	return $renderer->render($slate);
}
