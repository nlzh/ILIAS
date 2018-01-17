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
            return $this->renderPlank($component, $default_renderer);
        }

    }

    protected function renderSlate(Component\MainControls\Menu\Slate $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("Menu/tpl.slate.html", true, true);

        $toggle_signal = $component->getToggleSignal();

        $component = $component->withOnLoadCode(function($id) use ($toggle_signal) {
            return "$(document).on('{$toggle_signal}', function(event, signalData) {
                        il.UI.maincontrols.menu.slate.onClickTrigger(event, signalData, '{$id}');
                        return false;
                    })";
        });

        $id = $this->bindJavaScript($component);
        $tpl->setVariable('ID', $id);

        foreach ($component->getPlanks() as $plank) {
            $tpl->setCurrentBlock("plank_item");
            $tpl->setVariable("PLANK", $default_renderer->render($plank));
            $tpl->parseCurrentBlock();
        }

        $f = $this->getUIFactory();
        $closebtn = $f->button()->iconographic(
            $f->glyph()->back("#"),
            "close",
            "#"
        )->withOnClick($component->getToggleSignal());

        $tpl->setVariable("CLOSE", $default_renderer->render($closebtn));

        $backlinkbtn = $f->button()->iconographic(
            $f->glyph()->back("#"),
            "back",
            "#"
        )->withOnClick($component->getToggleSignal());
        $tpl->setVariable("BACKLINK", $default_renderer->render($backlinkbtn));

        return $tpl->get();
    }


    protected function renderPlank(Component\MainControls\Menu\Plank $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("Menu/tpl.plank.html", true, true);
        foreach ($component->getContents() as $element) {
            $tpl->setCurrentBlock("element");
            $tpl->setVariable("PLANKCONTENT", $default_renderer->render($element));
            $tpl->parseCurrentBlock();
        }
        return $tpl->get();
    }


    /**
     * @inheritdoc
     */
    public function registerResources(\ILIAS\UI\Implementation\Render\ResourceRegistry $registry) {
        parent::registerResources($registry);
        $registry->register('./src/UI/templates/js/MainControls/Menu/slate.js');
        $registry->register('./src/UI/templates/js/MainControls/Menu/plank.js');
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
