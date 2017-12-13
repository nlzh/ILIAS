<?php

/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts.and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout\Page;

use ILIAS\UI\Implementation\Render\AbstractComponentRenderer;
use ILIAS\UI\Renderer as RendererInterface;
use ILIAS\UI\Component;

class Renderer extends AbstractComponentRenderer {
    /**
     * @inheritdoc
     */
    public function render(Component\Component $component, RendererInterface $default_renderer) {
        $this->checkComponent($component);

        if ($component instanceof Component\Layout\Page\SideBar) {
            $tpl = $this->getTemplate("Page/tpl.sidebar.html", true, true);
            $tpl->setVariable("NAME",'dummy-name');
        }
        if ($component instanceof Component\Layout\Page\TopBar) {
            $tpl = $this->getTemplate("Page/tpl.topbar.html", true, true);
            $tpl->setVariable("NAME",'dummy-name');
        }

        return $tpl->get();
    }

    /**
     * @inheritdoc
     */
    protected function getComponentInterfaceName() {
        return array(
            Component\Layout\Page\SideBar::class,
            Component\Layout\Page\TopBar::class
        );

    }

}
