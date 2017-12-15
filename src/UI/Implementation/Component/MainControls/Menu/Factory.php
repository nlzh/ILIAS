<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component\MainControls\Menu as Menu;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

class Factory implements Menu\Factory {
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
	public function slate(array $planks){
		return new Slate($planks, $this->signal_generator);
	}

	/**
	 * @inheritdoc
	 */
	public function plank($content){
		return new Plank($content);
	}
}
