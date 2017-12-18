<?php

function metabar() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$metabar = $f->layout()->metabar();
	return $renderer->render($metabar);
}