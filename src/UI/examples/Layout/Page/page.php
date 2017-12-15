<?php

function page() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$content = $f->legacy("some content");
	$page = $f->layout()->page($content)
	;

	return $renderer->render($page);
}