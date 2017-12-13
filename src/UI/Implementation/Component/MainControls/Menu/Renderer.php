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
            $tpl = $this->getTemplate("Menu/tpl.slate.html", true, true);
            $tpl->setVariable("NAME",'dummy-name');
        }
        if ($component instanceof Component\MainControls\Menu\Plank) {
            $tpl = $this->getTemplate("Menu/tpl.plank.html", true, true);
            $tpl->setVariable("NAME",'dummy-name');
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
