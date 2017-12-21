<?php

function buildSlate($f) {

	$planks = array(
		$f->maincontrols()->menu()->plank()
			->withTitle('plank 1')
			->withElement($f->legacy('some content')),
		$f->maincontrols()->menu()->plank()
			->withTitle('plank 2')
			->withElement($f->legacy('some content')),
		$f->maincontrols()->menu()->plank()
			->withTitle('plank 3 (sub planks)')
			->withElement(
				$f->maincontrols()->menu()->plank()
					->withTitle('plank 3.1')
			)
	);

	return $f->maincontrols()->menu()->slate($planks);
}

function slate() {
	//Init Factory and Renderer
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$slate = buildSlate($f);

	$icon = $f->icon()->standard('someExample', 'Example');
	$icon = $icon->withAbbreviation('I')->withSize('medium');
	$button = $f->button()->iconographic($icon, 'trigger slate', '#')
		->withOnClick($slate->getToggleSignal());

	return $renderer->render([$button, $slate]);
}
