<?php

function page() {
	global $DIC;
	$f = $DIC->ui()->factory();
	$renderer = $DIC->ui()->renderer();

	$content = $f->legacy("some content");

	$page = $f->layout()->page($content)
		->withMetabar(page_getMetabar($f))
		->withSidebar(page_getSidebar($f))
		;

	return $renderer->render($page);
}


function page_getMetabar($f) {
	$logo = $f->image()->responsive(
		"src/UI/examples/Image/HeaderIconLarge.svg",
		"Thumbnail Example"
	);

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
        );

    $content = $f->legacy('AwarenessTool-<br><br>virtually anything');
    $popover = $f->popover()->standard($content);
    $awt = $f->maincontrols()->prompts()->awarenesstool($popover)
    	->withCounter(3);
	//$logout = $f->icon()->standard('','')->withAbbreviation('O');

	$metabar = $f->layout()->metabar()
		->withLogo($logo)
		->withElement($nc)
		->withElement($awt)
		//->withElement($logout)
		;

	return $metabar;
}

function page_getSidebar($f) {
	$mf = $f->maincontrols()->menu();

	$icon = $f->icon()->standard('sidebar_trigger', 'Example')
		->withSize('medium');

	$sidebar = $f->layout()->sidebar();

	foreach(range(1,4) as $c){
		$i = (string)$c;
		$plank = $f->maincontrols()->menu()->plank()
			->withTitle('a title - ' .$c);

		$plank2 = $plank
			->withElement($f->legacy('some element'))
			->withElement($plank)
			->withElement(
				$plank->withElement($plank)
			);

		$planks = array(
			$plank, $plank2
		);
		$slate =$mf->slate($planks);
		$button = $f->button()->iconographic($icon->withAbbreviation($i), "Button $i", '#');
		$sidebar = $sidebar->withEntry($button, $slate);
	}

	$extra_button = $f->button()->iconographic($icon->withAbbreviation('E'), 'Extra', '#');
	$sidebar = $sidebar->withEntry($extra_button);

	return $sidebar;
}


