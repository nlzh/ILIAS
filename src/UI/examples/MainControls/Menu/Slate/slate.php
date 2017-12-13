<?php

function slate() {
	//Init Factory and Renderer
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();


	$slate = $f->maincontrols()->menu()->slate();

	return $renderer->render($slate);
}
