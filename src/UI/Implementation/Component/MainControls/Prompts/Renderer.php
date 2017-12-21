<?php

/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts.and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Prompts;

use ILIAS\UI\Implementation\Render\AbstractComponentRenderer;
use ILIAS\UI\Renderer as RendererInterface;
use ILIAS\UI\Component;
use ILIAS\UI\Component\Counter\Counter as Spec;

class Renderer extends AbstractComponentRenderer {
    /**
     * @inheritdoc
     */
    public function render(Component\Component $component, RendererInterface $default_renderer) {
        $this->checkComponent($component);

        if ($component instanceof Component\MainControls\Prompts\NotificationCenter) {
            return $this->renderNotificationCenter($component, $default_renderer);
        }
        if ($component instanceof Component\MainControls\Prompts\AwarenessTool) {
            return $this->renderAwarenessTool($component, $default_renderer);
        }
    }

    protected function renderNotificationCenter(Component\MainControls\Prompts\NotificationCenter $component, RendererInterface $default_renderer) {
        $f = $this->getUIFactory();
        $tpl = $this->getTemplate("Prompts/tpl.notificationcenter.html", true, true);

        $overall_novelty = 0;
        $overall_status = 0;
        foreach ($component->getEntries() as $entry) {

            list($glyph, $label) = $entry;

            $counters = $glyph->getCounters();
            foreach ($counters as $counter) {
                if($counter->getType() === Spec::NOVELTY) {
                    $overall_novelty += $counter->getNumber();
                }
                if($counter->getType() === Spec::STATUS) {
                    $overall_status += $counter->getNumber();
                }
            }

            $shy = $f->button()->shy($label, $glyph->getAction());
            $tpl->setCurrentBlock('item');
            $tpl->setVariable('GLYPH', $default_renderer->render($glyph));
            $tpl->setVariable('LABEL', $default_renderer->render($shy));
            $tpl->parseCurrentBlock('item');
        }

        $glyph = $f->glyph()->notification("#");
        if($overall_novelty > 0 ) {
            $glyph = $glyph ->withCounter($f->counter()->novelty($overall_novelty));
        }
        if($overall_status > 0 ) {
            $glyph = $glyph ->withCounter($f->counter()->status($overall_status));
        }

        $tpl->setVariable("GLYPH", $default_renderer->render($glyph));

        return $tpl->get();
    }


    protected function renderAwarenessTool(Component\MainControls\Prompts\AwarenessTool $component, RendererInterface $default_renderer) {
        $f = $this->getUIFactory();
        $tpl = $this->getTemplate("Prompts/tpl.awarenesstool.html", true, true);

        $contents = $component->getContents();

        $glyph = $f->glyph()->user("#");
            //->withOnClick($popover->getShowSignal());

        if($counter = $component->getCounter()) {
            $glyph = $glyph ->withCounter($f->counter()->status($counter));
        }

        $tpl->setVariable("GLYPH", $default_renderer->render($glyph));
        $tpl->setVariable("CONTENTS", $default_renderer->render($contents));
        return $tpl->get();
    }

    /**
     * @inheritdoc
     */
    public function registerResources(\ILIAS\UI\Implementation\Render\ResourceRegistry $registry) {
        parent::registerResources($registry);
        $registry->register('./src/UI/templates/js/Dropdown/dropdown.js');
    }

    /**
     * @inheritdoc
     */
    protected function getComponentInterfaceName() {
        return array(
            Component\MainControls\Prompts\NotificationCenter::class,
            Component\MainControls\Prompts\AwarenessTool::class
        );

    }

}
