<?php

function topbar() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$topbar = $f->layout()->topbar();
	return $renderer->render($topbar);
}