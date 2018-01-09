<?php
function buildAwarenessTool($f) {
    $contents = array(
        $f->legacy('<b>AwarenessTool</b>'),
        $f->divider()->horizontal(),
        $f->legacy('something that wants your attention'),
        $f->divider()->horizontal(),
        $f->legacy('something else that wants your attention')
    );

    return $f->maincontrols()->prompts()->awarenesstool()
        ->withCounter(2) //novelty counter only, thus internalized
        ->withContents($contents);

}

function awt_base() {
    global $DIC;
    $f = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();
    $awt = buildAwarenessTool($f);
    return $renderer->render($awt);
}
