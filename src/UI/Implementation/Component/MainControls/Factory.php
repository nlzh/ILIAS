<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls;

use ILIAS\UI\Component\MainControls as MC;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

class Factory implements MC\Factory {
	/**
	 * @var SignalGeneratorInterface
	 */
	protected $signal_generator;

	/**
	 * @param SignalGeneratorInterface $signal_generator
	 */
	public function __construct(SignalGeneratorInterface $signal_generator) {
		$this->signal_generator = $signal_generator;
	}

	/**
	 * @inheritdoc
	 */
	public function menu(){
		return new Menu\Factory($this->signal_generator);
	}
	/**
	 * @inheritdoc
	 */
	public function prompts(){
		//return new Menu\Factory();
	}
}
