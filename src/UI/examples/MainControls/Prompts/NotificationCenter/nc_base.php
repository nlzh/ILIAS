<?php

function buildNotificationCenter($f) {

	$nc = $f->maincontrols()->prompts()->notificationcenter()
		->withEntry(
			$f->glyph()->mail('#')
			->withCounter($f->counter()->novelty(2))
			->withCounter($f->counter()->status(7))
			, 'entry1'
		)
		->withEntry(
			$f->glyph()->briefcase('#')
			->withCounter($f->counter()->status(1))
			, 'entry2'
		)
		->withEntry(
			$f->glyph()->comment('#')
			->withCounter($f->counter()->novelty(2))
			, 'entry3'
		);

	return $nc;
}

function nc_base() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();
    $nc = buildNotificationCenter($f);
    return $renderer->render($nc);
}
