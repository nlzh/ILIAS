<?php declare(strict_types=1);

/* Copyright (c) 2020 Nils Haagen <nils.haagen@concepts.and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Input\Container\ViewControl;

use ILIAS\UI\Implementation\Render\AbstractComponentRenderer;
use ILIAS\UI\Renderer as RendererInterface;
use ILIAS\UI\Component;
use ILIAS\UI\Component\Input\Container\ViewControl as VCContainer;
//use ILIAS\UI\Component\Signal;


class Renderer extends AbstractComponentRenderer
{
    public function render(Component\Component $component, RendererInterface $default_renderer)
    {
        $this->checkComponent($component);
        if ($component instanceof VCContainer\Standard) {
            return $this->renderViewControlContainer($component, $default_renderer);
        }
        throw new \LogicException("Cannot render: " . get_class($component));
    }

    protected function renderViewControlContainer(VCContainer\Standard $component, RendererInterface $default_renderer) : string
    {
        //$tpl = $this->getTemplate("tpl.standard.html", true, true);
        //return $tpl->get();
        $ret = '';
        foreach ($component->getInputs() as $viewcontrol) {
            $ret .= $default_renderer->render($viewcontrol);
        }
        return $ret;
    }

    /**
     * @inheritdoc
     */
    public function registerResources(\ILIAS\UI\Implementation\Render\ResourceRegistry $registry)
    {
        parent::registerResources($registry);
        //$registry->register('./src/UI/templates/js/Input/ViewControls/xxx.js');
    }

    /**
     * @inheritdoc
     */
    protected function getComponentInterfaceName()
    {
        return [
            VCContainer\Standard::class
        ];
    }

}
