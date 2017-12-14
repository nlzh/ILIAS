<?php

/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts.and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Implementation\Render\AbstractComponentRenderer;
use ILIAS\UI\Renderer as RendererInterface;
use ILIAS\UI\Component;

class Renderer extends AbstractComponentRenderer {
    /**
     * @inheritdoc
     */
    public function render(Component\Component $component, RendererInterface $default_renderer) {
        $this->checkComponent($component);

        if ($component instanceof Component\MainControls\Menu\Slate) {
            return $this->renderSlate($component, $default_renderer);
        }
        if ($component instanceof Component\MainControls\Menu\Plank) {
            $tpl = $this->getTemplate("Menu/tpl.plank.html", true, true);
            $tpl->setVariable("NAME",'dummy-name');
            return $tpl->get();
        }

    }

    protected function renderSlate(Component\MainControls\Menu\Slate $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("Menu/tpl.slate.html", true, true);

//        $button = $component->getButton();
//        $tpl->setVariable("BUTTON", $default_renderer->render($button));

        foreach ($component->getPlanks() as $plank) {
            $tpl->setCurrentBlock("plank_item");
            $tpl->setVariable("PLANK", $default_renderer->render($plank));
            $tpl->parseCurrentBlock();
        }

        return $tpl->get();
    }


    /**
     * @inheritdoc
     */
    protected function getComponentInterfaceName() {
        return array(
            Component\MainControls\Menu\Slate::class,
            Component\MainControls\Menu\Plank::class
        );

    }

}
