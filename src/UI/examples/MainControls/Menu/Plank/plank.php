<?php

function plank() {
	//Init Factory and Renderer
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();


	$plank = $f->maincontrols()->menu()->plank();

	return $renderer->render($plank);
}
