<?php

function plank() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $plank = $f->maincontrols()->menu()->plank();
    $planks = [
        $plank->withContents([
            $f->legacy('some content 1'),
            $f->legacy('some other content in 1'),
        ]),
        $plank->withContents([$f->legacy('some content 2')]),
        $plank->withContents([$f->legacy('some content 3')])
    ];

    return $renderer->render($planks);


}

function buildSimplePlank($f) {
    return $f->maincontrols()->menu()->plank()
        ->withContents([$f->legacy('some content')]);
}

function buildPlank($f) {
    return  $f->maincontrols()->menu()->plank()
        ->withContents([
            $f->legacy('some content'),
            $f->button()->standard("a button", "#"),
            $f->button()->standard("another button", "#"),
            $f->legacy('some more content'),
            $f->legacy('third content')
        ]);
}

