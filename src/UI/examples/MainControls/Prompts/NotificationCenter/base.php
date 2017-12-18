<?php

function base() {

	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$items = array(
		$f->maincontrols()->prompts()->glyphentry(
			$f->glyph()->user('#')
			->withCounter($f->counter()->novelty(2))
			->withCounter($f->counter()->status(7))
			, 'entry1'
		),
		$f->maincontrols()->prompts()->glyphentry(
			$f->glyph()->settings('#')
			->withCounter($f->counter()->novelty(1))
			->withCounter($f->counter()->status(2))
			, 'entry2'
		),
		$f->maincontrols()->prompts()->glyphentry(
			$f->glyph()->comment('#')
			->withCounter($f->counter()->status(3))
			, 'entry3'
		)
	);

	$nc = $f->maincontrols()->prompts()->notificationcenter($items);

	return $renderer->render($nc);
}
