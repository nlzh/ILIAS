<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Prompts;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;

class NotificationCenter implements C\MainControls\Prompts\NotificationCenter {
	use ComponentHelper;
	use JavaScriptBindable;

	protected $items;

	public function __construct(
		SignalGeneratorInterface $signal_generator) {
	}



	public function getEntries(){
		return $this->entries;
	}


	public function withEntry($glyph, $label) {
		$clone = clone $this;
		$clone->entries[] = array($glyph, $label);
		return $clone;
	}


	/**
	 * Set the signals for this component
	 */
	protected function initSignals() {
//		$this->toggle_signal = $this->signal_generator->create();
	}

	/**
	 * @inheritdoc
	 */
	public function withResetSignals() {
		$clone = clone $this;
		$clone->initSignals();
		return $clone;
	}

	public function getSomeSignal() {
		//return $this->toggle_signal;
	}


}
