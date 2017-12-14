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
            return $this->renderSidebar($component, $default_renderer);
        }
        if ($component instanceof Component\Layout\Page\TopBar) {
            $tpl = $this->getTemplate("Page/tpl.topbar.html", true, true);
            $tpl->setVariable("NAME",'dummy-name');
            return $tpl->get();
        }
    }

    protected function renderSidebar(Component\Layout\Page\SideBar $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("Page/tpl.sidebar.html", true, true);

        foreach ($component->getSlates() as $slate) {

            $button = $slate->getButton();
            $tpl->setCurrentBlock("slate_trigger");
            $tpl->setVariable("SLATE_TRIGGER", $default_renderer->render($button));
            $tpl->parseCurrentBlock();


            $tpl->setCurrentBlock("slate_item");
            $tpl->setVariable("SLATE", $default_renderer->render($slate));
            $tpl->parseCurrentBlock();
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
