<?php

function plank() {
	//Init Factory and Renderer
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$plank = $f->maincontrols()->menu()->plank()
		->withTitle('a title');

	$plank2 = $plank
		->withElement($f->legacy('some element'))
		->withElement($plank)
		->withElement(
			$plank->withElement($plank)
		);

	return $renderer->render([
		$plank,
		$f->divider()->horizontal(),
		$plank2
	]);
}
