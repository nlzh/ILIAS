<?php

function plank() {
	//Init Factory and Renderer
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$c = $f->legacy('some content');
	$plank = $f->maincontrols()->menu()->plank($c);

	return $renderer->render($plank);
}
