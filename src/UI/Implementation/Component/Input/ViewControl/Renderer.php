<?php declare(strict_types=1);

/* Copyright (c) 2020 Nils Haagen <nils.haagen@concepts.and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Input\ViewControl;

use ILIAS\UI\Implementation\Render\AbstractComponentRenderer;
use ILIAS\UI\Renderer as RendererInterface;
use ILIAS\UI\Component;
use ILIAS\UI\Component\Input\ViewControl as VCInterface;
//use ILIAS\UI\Component\Signal;


class Renderer extends AbstractComponentRenderer
{
    public function render(Component\Component $component, RendererInterface $default_renderer)
    {
        $this->checkComponent($component);
        if ($component instanceof VCInterface\FieldSelection) {
            return $this->renderFieldSelection($component, $default_renderer);
        }
        throw new \LogicException("Cannot render: " . get_class($component));
    }

    protected function renderFieldSelection(VCInterface\FieldSelection $component, RendererInterface $default_renderer) : string
    {
        $tpl = $this->getTemplate("tpl.viewcontrol.fieldselection.html", true, true);
        foreach ($component->getOptions() as $value => $label) {
            $tpl->setCurrentBlock('option');
            $tpl->setVariable('VALUE', $value);
            $tpl->setVariable('LABEL', $label);
            $tpl->parseCurrentBlock();
        }

        
        //$tpl->setVariable('NAME', $component->getName());
        //$tpl->setVariable('CONTENTS', $default_renderer->render($contents));
        return $tpl->get();
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
            VCInterface\FieldSelection::class
        ];
    }

}
