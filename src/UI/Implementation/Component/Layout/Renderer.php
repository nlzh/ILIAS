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
        if ($component instanceof Component\Layout\MetaBar) {
            return $this->renderMetabar($component, $default_renderer);
        }
    }

    protected function renderSidebar(Component\Layout\SideBar $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("tpl.sidebar.html", true, true);

        $entry_signal = $component->getEntryClickSignal();

        foreach ($component->getButtons() as $button) {
            $button = $button->appendOnClick($entry_signal);
            //->appendTriggeredSignal($entry_signal, 'click');
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

                    var down_class = 'engaged',
                        class_engaged_slates = 'with-engaged-slates';

                    //set all non-triggerer to inactive
                    result = $('#{$id} .sidebar-triggers .btn');
                    result.each( function(index, obj) {
                        if($(obj).attr('id') != signalData.triggerer.attr('id')) {
                            $(obj).removeClass(down_class);
                        }
                    });

                    //toggle triggerer active/inactive
                    if(signalData.triggerer.hasClass(down_class)) {
                        signalData.triggerer.removeClass(down_class);
                    } else {
                        signalData.triggerer.addClass(down_class);
                    }

                    if($('#{$id} .il-maincontrol-menu-slate.engaged').length > 0) {
                        $('#{$id}').addClass(class_engaged_slates);
                    } else {
                        $('#{$id}').removeClass(class_engaged_slates);
                    }
                });";

            return $registry;
        });

        $id = $this->bindJavaScript($component);
        $tpl->setVariable('ID', $id);

        return $tpl->get();
    }


    protected function renderMetabar(Component\Layout\MetaBar $component, RendererInterface $default_renderer) {
        $f = $this->getUIFactory();
        $tpl = $this->getTemplate("tpl.metabar.html", true, true);

        $tpl->setVariable("LOGO", $default_renderer->render($component->getLogo()));

        foreach ($component->getElements() as $element) {
            $tpl->setCurrentBlock('meta_element');
            $tpl->setVariable("ELEMENT", $default_renderer->render($element));
            $tpl->parseCurrentBlock();
        }

        return $tpl->get();
    }


    protected function renderPage(Component\Layout\Page $component, RendererInterface $default_renderer) {
        $tpl = $this->getTemplate("tpl.page.html", true, true);


        if($metabar = $component->getMetabar()) {
            $tpl->setVariable('METABAR', $default_renderer->render($metabar));
        }
        if($sidebar = $component->getSidebar()) {
            $tpl->setVariable('SIDEBAR', $default_renderer->render($sidebar));
        }

        $tpl->setVariable('CONTENT', $default_renderer->render($component->getContent()));

if ($_GET['new_ui'] == '1') {
        $tpl = $this->setHeaderVars($tpl);
}
        return $tpl->get();
    }


    protected function setHeaderVars($tpl) {

        global $DIC;
        $il_tpl = $DIC["tpl"];

        $base_url = '../../../../../';

        // always load jQuery
        include_once("./Services/jQuery/classes/class.iljQueryUtil.php");
        \iljQueryUtil::initjQuery($il_tpl);
        include_once("./Services/UICore/classes/class.ilUIFramework.php");
        \ilUIFramework::init($il_tpl);

        $il_js_files = $il_tpl->js_files_batch;
        asort($il_js_files);

        $js_files = array();
        foreach($il_js_files as $il_js_file=>$batch) {
            $js_files[] = $il_js_file;
        }

        $css_files = array();
        foreach($il_tpl->css_files as $il_css_file) {
            $css_files[] = $il_css_file['file'];
        }
        $css_files[] = \ilUtil::getStyleSheetLocation("filesystem", "delos.css");
        $css_files[] = \ilUtil::getNewContentStyleSheetLocation();

        $css_inline = $il_tpl->inline_css;

        $olc = '';
        if($il_tpl->on_load_code) {
            foreach ($il_tpl->on_load_code as $key => $value) {
                $olc .= implode(PHP_EOL, $value);
             }
        }

         //fill
        foreach ($js_files as $js_file) {
            $tpl->setCurrentBlock("js_file");
            $tpl->setVariable("JS_FILE", $js_file);
            $tpl->parseCurrentBlock();
        }
        foreach ($css_files as $css_file) {
            $tpl->setCurrentBlock("css_file");
            $tpl->setVariable("CSS_FILE", $css_file);
            $tpl->parseCurrentBlock();
        }
        $tpl->setVariable("CSS_INLINE", implode(PHP_EOL, $css_inline));
        $tpl->setVariable("OLCODE", $olc);

        $tpl->setVariable("BASE", $base_url);
        return $tpl;
    }


    /**
     * @inheritdoc
     */
    protected function getComponentInterfaceName() {
        return array(
            Component\Layout\SideBar::class,
            Component\Layout\MetaBar::class,
            Component\Layout\Page::class
        );

    }

}
