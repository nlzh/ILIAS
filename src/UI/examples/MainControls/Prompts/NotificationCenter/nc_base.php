<?php

function nc_base() {

	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$nc = $f->maincontrols()->prompts()->notificationcenter()
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

	return $renderer->render($nc);
}
