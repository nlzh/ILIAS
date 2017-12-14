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
            $tpl->setVariable("CONTENT",
                $default_renderer->render($component->getContent())
            );
            return $tpl->get();
        }

    }

    protected function renderSlate(Component\MainControls\Menu\Slate $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("Menu/tpl.slate.html", true, true);

        $internal_signal = $component->getToggleSignal();

        $component = $component->withOnLoadCode(function($id) use ($internal_signal) {
            return "$(document).on('{$internal_signal}', function(event, signalData) {
                        il.UI.maincontrols.menu.slate.onClickTigger(event, signalData, '{$id}');
                        return false;
                    })";
        });

        $id = $this->bindJavaScript($component);
        $tpl->setVariable('ID', $id);

        //$button = $component->getButton();
        //$tpl->setVariable("BUTTON", $default_renderer->render($button));

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
    public function registerResources(\ILIAS\UI\Implementation\Render\ResourceRegistry $registry) {
        parent::registerResources($registry);
        $registry->register('./src/UI/templates/js/MainControls/Menu/slate.js');
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
