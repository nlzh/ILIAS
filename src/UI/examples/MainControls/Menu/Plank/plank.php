<?php

function plank() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    return $renderer->render([
        $f->legacy('simple plank'),
        buildSimplePlank($f),
        $f->divider()->horizontal(),

        $f->legacy('simple plank expanded'),
        buildSimplePlank($f)->withStaticExpansion(true),
        $f->divider()->horizontal(),

        $f->legacy('sub planks'),
        buildSubPlanks($f),
        $f->divider()->horizontal(),
    ]);

}

function buildSimplePlank($f) {
    return $f->maincontrols()->menu()->plank()
        ->withTitle('a title')
        ->withElement(
            $f->legacy('some content')
        );
}

function buildSubPlanks($f) {

    return
    $f->maincontrols()->menu()->plank()
        ->withTitle('plank 1 (sub)')
        ->withElement($f->legacy('some content'))
        ->withElement(
            $f->maincontrols()->menu()->plank()
                ->withTitle('plank 1.1')
                ->withElement($f->legacy('some more content'))
        )
        ->withElement(
            $f->maincontrols()->menu()->plank()
                ->withTitle('plank 1.2')
                ->withElement(
                    $f->maincontrols()->menu()->plank()
                    ->withTitle('plank 1.2.1')
                    ->withElement($f->legacy('too nested...'))
                )
        )

        ->withElement(
            $f->maincontrols()->menu()->plank()
                ->withTitle('plank 1.3')
        );
}
