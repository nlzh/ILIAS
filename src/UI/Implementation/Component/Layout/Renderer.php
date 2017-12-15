<?php

/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts.and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout;

use ILIAS\UI\Implementation\Render\AbstractComponentRenderer;
use ILIAS\UI\Renderer as RendererInterface;
use ILIAS\UI\Component;

class Renderer extends AbstractComponentRenderer {
    /**
     * @inheritdoc
     */
    public function render(Component\Component $component, RendererInterface $default_renderer) {
        $this->checkComponent($component);

        if ($component instanceof Component\Layout\Page) {
            return $this->renderPage($component, $default_renderer);
        }
        if ($component instanceof Component\Layout\SideBar) {
            return $this->renderSidebar($component, $default_renderer);
        }
        if ($component instanceof Component\Layout\TopBar) {
            $tpl = $this->getTemplate("tpl.topbar.html", true, true);
            $tpl->setVariable("NAME",'dummy-name');
            return $tpl->get();
        }
    }

    protected function renderSidebar(Component\Layout\SideBar $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("tpl.sidebar.html", true, true);

        $entry_signal = $component->getEntryClickSignal();

        foreach ($component->getButtons() as $button) {
            $button = $button->appendOnClick($entry_signal);
            $tpl->setCurrentBlock("trigger_item");
            $tpl->setVariable("BUTTON", $default_renderer->render($button));
            $tpl->parseCurrentBlock();
       }

        foreach ($component->getSlates() as $slate) {
            $tpl->setCurrentBlock("slate_item");
            $tpl->setVariable("SLATE", $default_renderer->render($slate));
            $tpl->parseCurrentBlock();
       }

        $component = $component->withOnLoadCode(function($id) use ($entry_signal) {
            $registry = '';
                $registry .= "$(document).on('{$entry_signal}', function(event, signalData) {

                    var down_class = 'engaged';
                    //toggle triggerer active/inactive
                    result = $('#{$id} .sidebar-triggers .btn');
                    result.each( function(index, obj) {
                        if($(obj).attr('id') != signalData.triggerer.attr('id')) {
                            $(obj).removeClass(down_class);
                        }
                    });

                    if(signalData.triggerer.hasClass(down_class)) {
                        signalData.triggerer.removeClass(down_class);
                    } else {
                        signalData.triggerer.addClass(down_class);
                    }

                    //disengage all active slates
                    $('#{$id} .il-maincontrol-menu-slate.engaged').each( function() {
                        il.UI.maincontrols.menu.slate.toggle($(this));
                    });

                });";

            return $registry;
        });



        $id = $this->bindJavaScript($component);
        $tpl->setVariable('ID', $id);

        return $tpl->get();
    }



    protected function renderPage(Component\Layout\Page $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("tpl.page.html", true, true);
        $tpl->setVariable('CONTENT', $default_renderer->render($component->getContent()));

        if($topbar = $component->getTopbar()) {
            $tpl->setVariable('TOPBAR', $default_renderer->render($topbar));
        }
        if($sidebar = $component->getSidebar()) {
            $tpl->setVariable('SIDEBAR', $default_renderer->render($sidebar));
        }

        return $tpl->get();
    }



    /**
     * @inheritdoc
     */
    protected function getComponentInterfaceName() {
        return array(
            Component\Layout\SideBar::class,
            Component\Layout\TopBar::class,
            Component\Layout\Page::class
        );

    }

}
