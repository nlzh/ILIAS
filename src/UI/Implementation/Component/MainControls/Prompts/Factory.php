<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Prompts;

use ILIAS\UI\Component\MainControls\Prompts as Prompts;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

class Factory implements Prompts\Factory {
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
	public function notificationcenter(){
		return new NotificationCenter($this->signal_generator);
	}

	/**
	 * @inheritdoc
	 */
	public function awarenesstool(){
		return new AwarenessTool($this->signal_generator);
	}
}
