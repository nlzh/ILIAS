<?php

function awt_base() {

	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();


	$awt = $f->maincontrols()->prompts()->awarenesstool();

	return $renderer->render($awt);
}
