<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

/**
 * Plank
 */
class Plank implements C\MainControls\Menu\Plank {
	use ComponentHelper;
	use JavaScriptBindable;

	/**
	 * @var 	Component[]
	 */
	private $contents = array();

	/**
	 * @var Signal
	 */
	private $toggle_signal;


	public function __construct(SignalGeneratorInterface $signal_generator) {
		$this->signal_generator = $signal_generator;
		$this->initSignals();
	}

	/**
	 * @inheritdoc
	 */
	public function withContents(array $contents) {
		$clone = clone $this;
		$clone->contents = $contents;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getContents() {
		return $this->contents;
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
	 * Set the show and close signals for this component
	 */
	protected function initSignals() {
		$this->toggle_signal = $this->signal_generator->create();
	}

}
