<?php

function sidebar() {
	//Init Factory and Renderer
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();


	$sidebar = $f->layout()->page()->sidebar();

	return $renderer->render($sidebar);
}
