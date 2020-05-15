<?php

/* Copyright (c) 2020 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Input\Container\ViewControl;

use ILIAS\UI\Component\Input\Container\ViewControl as V;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

/**
 * Factory for the View Control Containers
 */
class Factory implements V\Factory
{
	/**
     * @var SignalGeneratorInterface
     */
    protected $signal_generator;

    public function __construct(
        SignalGeneratorInterface $signal_generator
    ) {
    	$this->signal_generator = $signal_generator;
    }

    public function standard(array $controls) : V\Standard
    {
        return new Standard($this->signal_generator, $controls);
    }
}
