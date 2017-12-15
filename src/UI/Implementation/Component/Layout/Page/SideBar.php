<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout\Page;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

class SideBar implements C\Layout\Page\SideBar {
	use ComponentHelper;
	use JavaScriptBindable;

	/**
	 * @var []
	 */
	private $buttons;

	/**
	 * @var []
	 */
	private $slates;

	private $signal_generator;
	private $entry_click_signal;

	public function __construct($buttons, $slates, SignalGeneratorInterface $signal_generator) {
		$this->buttons = $buttons;
		$this->slates = $slates;
		$this->signal_generator = $signal_generator;
		$this->initSignals();
	}

	public function getButtons() {
		return $this->buttons;
	}

	public function getSlates() {
		return $this->slates;
	}

	public function getEntryClickSignal() {
		return $this->entry_click_signal;
	}

	/**
	 * Set the signals for this component
	 */
	protected function initSignals() {
		$this->entry_click_signal = $this->signal_generator->create();
		//$this->button = $this->button->withOnClick($this->toggle_signal);
	}

	/**
	 * @inheritdoc
	 */
	public function withResetSignals() {
		$clone = clone $this;
		$clone->initSignals();
		return $clone;
	}

}
