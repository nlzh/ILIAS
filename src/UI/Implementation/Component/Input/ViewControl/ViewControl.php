<?php

/* Copyright (c) 2020 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Input\ViewControl;

use ILIAS\UI\Component\Input\ViewControl\ViewControl as VCInterface;
use ILIAS\UI\Component\Signal;
use ILIAS\Refinery\Transformation;

use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;
use ILIAS\UI\Implementation\Component\Triggerer;

abstract class ViewControl implements VCInterface
{
    use ComponentHelper;
    use JavaScriptBindable;
    use Triggerer;

    /*
     * @var    mixed
     */
    protected $value = null;
    
    /**
     * @var    string|null
     */
    private $name = null;


    public function withNameFrom(NameSource $source)
    {
        $clone = clone $this;
        $clone->name = $source->getNewName();

        return $clone;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function withValue($value) : ViewControl
    {
        //$this->checkArg("value", $this->isClientSideValueOk($value), "Display value does not match input type.");
        $clone = clone $this;
        $clone->value = $value;
        return $clone;
    }

    public function withAdditionalTransformation(Transformation $trafo) : VCInterface
    {
        $clone = clone $this;
        $clone->setAdditionalTransformation($trafo);
        return $clone;
    }

    protected function setAdditionalTransformation(Transformation $trafo)
    {
        $this->operations[] = $trafo;
        if ($this->content !== null) {
            if (!$this->content->isError()) {
                $this->content = $trafo->applyTo($this->content);
            }
            if ($this->content->isError()) {
                $this->setError($this->content->error());
            }
        }
    }

    public function withOnChange(Signal $signal): VCInterface {
        $clone = clone $this;
        //$clone-> ....
        return $clone;
    }
}
