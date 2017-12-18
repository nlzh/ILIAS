<?php

/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts.and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Prompts;

use ILIAS\UI\Implementation\Render\AbstractComponentRenderer;
use ILIAS\UI\Renderer as RendererInterface;
use ILIAS\UI\Component;

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
        $glyph = $f->glyph()->mail("#")
            ->withCounter($f->counter()->novelty(2))
            ->withCounter($f->counter()->status(5));

        $tpl->setVariable("GLYPH", $default_renderer->render($glyph));
        return $tpl->get();
    }

    protected function renderAwarenessTool(Component\MainControls\Prompts\AwarenessTool $component, RendererInterface $default_renderer) {
        $f = $this->getUIFactory();
        $tpl = $this->getTemplate("Prompts/tpl.awarenesstool.html", true, true);
        $glyph = $f->glyph()->notification("#")
            ->withCounter($f->counter()->novelty(1));

        $tpl->setVariable("GLYPH", $default_renderer->render($glyph));
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
            Component\MainControls\Prompts\AwarenessTool::class
        );

    }

}
