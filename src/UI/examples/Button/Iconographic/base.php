<?php
function base() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$button = $f->button()->iconographic();


	return $renderer->render($button);
}