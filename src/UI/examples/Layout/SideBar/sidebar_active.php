<?php
function sidebar_active() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $glyph = $f->glyph()->note();
    $extra_button = $f->button()->iconographic($glyph, 'Extra', '#');
    $sidebar = $f->layout()->sidebar();
    $sidebar = $sidebar->withEntry('e1', $extra_button);
    $sidebar = $sidebar->withEntry('e2', $extra_button);
    $sidebar = $sidebar->withEntry('e3', $extra_button);
    $sidebar = $sidebar->withEntry('e4', $extra_button);
    $sidebar = $sidebar->withActive('e3');

    return $renderer->render($sidebar);
}
