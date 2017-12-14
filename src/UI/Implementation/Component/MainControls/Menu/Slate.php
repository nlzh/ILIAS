<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;

class Slate implements C\MainControls\Menu\Slate {
	use ComponentHelper;
	use JavaScriptBindable;

	/**
	 * @var \ILIAS\UI\Component\Button\Iconographic
	 */
	private $button;

	/**
	 * @var Plank[]
	 */
	private $planks;

	/**
	 * @var Signal
	 */
	protected $toggle_signal;

	public function __construct(
		\ILIAS\UI\Component\Button\Iconographic $button,
		array $planks,
		SignalGeneratorInterface $signal_generator) {

		$this->button = $button;
		$this->planks = $planks;
		$this->signal_generator = $signal_generator;

		$this->initSignals();
	}

	public function getButton() {
		return $this->button;
	}

	public function getPlanks() {
		return $this->planks;
	}

	/**
	 * Set the signals for this component
	 */
	protected function initSignals() {
		$this->toggle_signal = $this->signal_generator->create();
		$this->button = $this->button->withOnClick($this->toggle_signal);
	}

	/**
	 * @inheritdoc
	 */
	public function withResetSignals() {
		$clone = clone $this;
		$clone->initSignals();
		return $clone;
	}

	public function getToggleSignal() {
		return $this->toggle_signal;
	}


}
