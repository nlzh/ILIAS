<?php declare(strict_types=1);

/* Copyright (c) 2020 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Input\Container\ViewControl;

use ILIAS\UI\Component\Input\Container\ViewControl as VC;
use ILIAS\UI\Component\Input\ViewControl as V;
use ILIAS\UI\Component\Signal;
use ILIAS\UI\Implementation\Component as CI;
use Psr\Http\Message\ServerRequestInterface;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

/**
 * This implements commonalities between all ViewControl Containers.
 */
class ViewControl implements VC\ViewControl, CI\Input\NameSource
{
    /**
     * @var V\ViewControl[]
     */
    protected $viewcontrols;

    /**
     * @var Signal
     */
    protected $submit_signal;

    /**
     * For the implementation of NameSource.
     * @var    int
     * @var    int
     */
    private $count = 0;

    use ComponentHelper;

    /**
     * @param ILIAS\UI\Component\Input\ViewControl\ViewControl[]
     */
    public function __construct(
        SignalGeneratorInterface $signal_generator,
        array $viewcontrols
    ) {
        $classes = [V\ViewControl::class];
        $this->checkArgListElements("viewcontrols", $viewcontrols, $classes);
        // TODO: this is a dependency and should be treated as such. `use` statements can be removed then.
        /*$this->input_group = $field_factory->group(
            $inputs,
            "",
            ""
        )->withNameFrom($this);
        */
        $this->submit_signal = $signal_generator->create();
        $viewcontrols = array_map(function($control) {
            return $control->withResetTriggeredSignals()->withOnChange($this->submit_signal);
        }, $viewcontrols);

        $this->viewcontrols = $viewcontrols;
    }

    protected function getSubmitSignal(): Signal
    {
        return $this->submit_signal;
    }

    /**
     * @inheritdoc
     */
    public function getInputs() : array
    {
        return $this->viewcontrols;
    }

    public function withRequest(ServerRequestInterface $request) : VC\ViewControl
    {
        $clone = clone $this;
        return $clone;
    }

    /**
     * @inheritdoc
     */
    public function getData() : array
    {
        $controls = $this->getInputs();
        if(count($controls) === 0) {
            return new \ILIAS\Data\Result\Ok([]);
        }
        foreach ($this->getInputs() as $name => $viewcontrol) {
            # code...
        }
        return [];
    }

    public function getNewName()
    {
        $name = "vc_input_{$this->count}";
        $this->count++;
        return $name;
    }
}
