<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

class Plank implements C\MainControls\Menu\Plank {
	use ComponentHelper;
	use JavaScriptBindable;

	/**
	 * @var
	 */
	private $title;
	private $elements = array();
	private $static_expand = true;
	private $show_signal;
	private $close_signal;

	public function __construct(SignalGeneratorInterface $signal_generator) {
		$this->signal_generator = $signal_generator;
		$this->initSignals();
	}



	public function withTitle($title) {
		$clone = clone $this;
		$clone->title = $title;
		return $clone;
	}

	public function getTitle() {
		return $this->title;
	}

	public function withElement($element) {
		$clone = clone $this;
		$clone->elements[] = $element;
		return $clone;
	}

	public function getElements() {
		return $this->elements;
	}

	public function withStaticExpansion($expand=false) {
		$clone = clone $this;
		$clone->static_expand = $expand;
		return $clone;
	}

	public function getStaticExpanded() {
		return $this->static_expand;
	}




	public function withResetSignals() {
		$clone = clone $this;
		$clone->initSignals();
		return $clone;
	}
	/**
	 * Set the show and close signals for this component
	 */
	protected function initSignals() {
		$this->show_signal = $this->signal_generator->create();
		$this->close_signal = $this->signal_generator->create();
	}

	/**
	 * @inheritdoc
	 */
	public function getShowSignal() {
		return $this->show_signal;
	}

	/**
	 * @inheritdoc
	 */
	public function getCloseSignal() {
		return $this->close_signal;
	}
}
