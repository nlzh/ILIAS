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
	 * @var string
	 */
	private $title;

	/**
	 * @var
	 */
	private $elements = array();

	/**
	 * @var bool
	 */
	private $static_expand = false;

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
	public function withTitle($title) {
		$clone = clone $this;
		$clone->title = $title;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @inheritdoc
	 */
	public function withElement($element) {
		$clone = clone $this;
		$clone->elements[] = $element;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getElements() {
		return $this->elements;
	}

	/**
	 * @inheritdoc
	 */
	public function withStaticExpansion($expand=false) {
		$clone = clone $this;
		$clone->static_expand = $expand;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getStaticExpanded() {
		return $this->static_expand;
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

	/**
	 * @inheritdoc
	 */
	public function getToggleSignal() {
		return $this->toggle_signal;
	}

}
