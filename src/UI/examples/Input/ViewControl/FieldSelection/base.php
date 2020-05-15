<?php
function base()
{
    global $DIC;
    $ui = $DIC->ui()->factory();
    $renderer = $DIC->ui()->renderer();
    $request = $DIC->http()->request();

    $fieldselection = $ui->input()->viewcontrol()->fieldselection(
        [
            '1' => 'option 1',
            '2' => 'option 2',
            '3' => 'option 3'
        ],
        "FieldSelection",
        "Aspect"
    );

    $vccontainer = $ui->input()->container()->viewcontrol()->standard([$fieldselection])
        ->withRequest($request);
    $result = $vccontainer->getData();

    return "<pre>" .print_r($result, true) ."</pre><br/>" 
        .$renderer->render($vccontainer);
}
