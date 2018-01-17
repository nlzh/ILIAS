<?php

function slate() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$planks = array(
		$f->maincontrols()->menu()->plank()
			->withContents([$f->legacy('some content 1')]),
		$f->maincontrols()->menu()->plank()
			->withContents([$f->legacy('some content 2')]),
		$f->maincontrols()->menu()->plank()
			->withContents([$f->legacy('some content 3')]),
	);
	$slate = $f->maincontrols()->menu()->slate($planks);


	$icon = $f->glyph()->note();
	$button = $f->button()->iconographic($icon, 'trigger slate', '#')
		->withOnClick($slate->getToggleSignal());

	return $renderer->render([$button, $slate]);
}
