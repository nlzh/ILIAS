<?php
function sidebar_active() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();

    $glyph = $f->glyph()->note();
    $button = $f->button()->iconographic($glyph, 'Some Button', '#');
    $entry = $f->layout()->sidebarentry($button);

    $entries = array($entry, $entry, $entry, $entry);
    $sidebar = $f->layout()->sidebar($entries, 2);

    return $renderer->render($sidebar);
}
