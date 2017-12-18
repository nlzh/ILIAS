<?php

function base() {

	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$nc = $f->maincontrols()->prompts()->notificationcenter();

	return $renderer->render($nc);
}
