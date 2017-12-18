<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Prompts;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;

class GlyphEntry implements C\MainControls\Prompts\GlyphEntry {
	use ComponentHelper;
	use JavaScriptBindable;


	public function __construct(
		$glyph, $label,
		SignalGeneratorInterface $signal_generator) {
		$this->glyph = $glyph;
		$this->label = $label;
	}


	public function getGlyph(){
		return $this->glyph;
	}

	public function getLabel(){
		return $this->label;
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
