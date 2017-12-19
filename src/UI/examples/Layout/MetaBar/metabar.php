<?php

function metabar() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

$awt = $f->maincontrols()->prompts()->awarenesstool();
$logout = $f->icon()->standard('','')->withAbbreviation('O');


	$metabar = $f->layout()->metabar()
		->withLogo(mb_getLogo($f))
		->withElement(mb_getNotificationCenter($f))
		->withElement($awt)
		->withElement($logout)
		;

	return $renderer->render($metabar);
}

function mb_getLogo($f){
	return $f->image()->responsive(
		"src/UI/examples/Image/HeaderIconLarge.svg",
		"Thumbnail Example"
	);
}

function mb_getNotificationCenter($f){
	return $f->maincontrols()->prompts()->notificationcenter()
        ->withEntry(
            $f->glyph()->user('#')
            ->withCounter($f->counter()->novelty(2))
            ->withCounter($f->counter()->status(7))
            , 'entry1'
        )
        ->withEntry(
            $f->glyph()->settings('#')
            ->withCounter($f->counter()->novelty(1))
            ->withCounter($f->counter()->status(2))
            , 'entry2'
        )
        ->withEntry(
            $f->glyph()->comment('#')
            ->withCounter($f->counter()->status(3))
            , 'entry3'
        );
}




