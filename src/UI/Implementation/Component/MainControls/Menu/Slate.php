<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;

/**
 * Slate
 */
class Slate implements C\MainControls\Menu\Slate {
	use ComponentHelper;
	use JavaScriptBindable;

	/**
	 * @var bool
	 */
	private $active;

	/**
	 * @var Plank[]
	 */
	private $planks;

	/**
	 * @var Signal
	 */
	protected $toggle_signal;

	/**
	 * @var Signal
	 */
	protected $replace_signal;


	public function __construct(
		array $planks,
		SignalGeneratorInterface $signal_generator) {

		$this->planks = $planks;
		$this->signal_generator = $signal_generator;

		$this->initSignals();
	}

	/**
	 * @inheritdoc
	 */
	public function getPlanks() {
		return $this->planks;
	}

	/**
	 * @param 	Plank 	$plank
	 */
	public function withAdditionalPlank($plank) {
		$clone = clone $this;
		$clone->planks[] = $plank;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function withActive($state) {
		$this->checkBoolArg('state', $state);
		$clone = clone $this;
		$clone->active = $state;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * Set the signals for this component
	 */
	protected function initSignals() {
		$this->toggle_signal = $this->signal_generator->create();
		$this->replace_signal = $this->signal_generator->create();
	}

	/**
	 * @inheritdoc
	 */
	public function withResetSignals() {
		$clone = clone $this;
		$clone->initSignals();
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getToggleSignal() {
		return $this->toggle_signal;
	}

	/**
	 * @inheritdoc
	 */
	public function getReplaceContentSignal() {
		return $this->replace_signal;
	}

}
