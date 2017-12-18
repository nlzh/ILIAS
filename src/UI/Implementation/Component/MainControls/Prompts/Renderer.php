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
        if ($component instanceof Component\MainControls\Prompts\GlyphEntry) {
            return $this->renderGlyphEntry($component, $default_renderer);
        }
    }

    protected function renderNotificationCenter(Component\MainControls\Prompts\NotificationCenter $component, RendererInterface $default_renderer) {
        $f = $this->getUIFactory();
        $tpl = $this->getTemplate("Prompts/tpl.notificationcenter.html", true, true);

        $overall_novelty = 0;
        $overall_status = 0;
        foreach ($component->getItems() as $entry) {


            $counters = $entry->getGlyph()->getCounters();
            foreach ($counters as $counter) {
                if($counter->getType() === Spec::NOVELTY) {
                    $overall_novelty += $counter->getNumber();
                }
                if($counter->getType() === Spec::STATUS) {
                    $overall_status += $counter->getNumber();
                }
            }

            $tpl->setCurrentBlock('item');
            $tpl->setVariable('ITEM', $default_renderer->render($entry));
            $tpl->parseCurrentBlock('item');
        }

        $glyph = $f->glyph()->mail("#");
        if($overall_novelty > 0 ) {
            $glyph = $glyph ->withCounter($f->counter()->novelty($overall_novelty));
        }
        if($overall_status > 0 ) {
            $glyph = $glyph ->withCounter($f->counter()->status($overall_status));
        }

        $tpl->setVariable("GLYPH", $default_renderer->render($glyph));
        return $tpl->get();
    }

    protected function renderGlyphEntry(Component\MainControls\Prompts\GlyphEntry $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("Prompts/tpl.glyphentry.html", true, true);
        $tpl->setVariable("GLYPH", $default_renderer->render($component->getGlyph()));
        $tpl->setVariable("LABEL", $component->getLabel());
        return $tpl->get();
    }

    protected function renderAwarenessTool(Component\MainControls\Prompts\AwarenessTool $component, RendererInterface $default_renderer) {
        $f = $this->getUIFactory();
        $tpl = $this->getTemplate("Prompts/tpl.awarenesstool.html", true, true);

        $content = $f->legacy('AwarenessTool-<br><br>x2<br>x2<br>x2<br>');
        $popover = $f->popover()->standard($content)
            ->withVerticalPosition();

        $glyph = $f->glyph()->notification("#")
            ->withCounter($f->counter()->novelty(1))
            ->withOnClick($popover->getShowSignal());

        $tpl->setVariable("GLYPH", $default_renderer->render([$glyph, $popover]));
        return $tpl->get();
    }

    /**
     * @inheritdoc
     */
    public function registerResources(\ILIAS\UI\Implementation\Render\ResourceRegistry $registry) {
        //parent::registerResources($registry);
        //$registry->register('./src/UI/templates/js/MainControls/Menu/slate.js');
    }

    /**
     * @inheritdoc
     */
    protected function getComponentInterfaceName() {
        return array(
            Component\MainControls\Prompts\NotificationCenter::class,
            Component\MainControls\Prompts\AwarenessTool::class,
            Component\MainControls\Prompts\GlyphEntry::class
        );

    }

}
