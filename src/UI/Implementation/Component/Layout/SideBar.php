<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

class SideBar implements C\Layout\SideBar {
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

	public function __construct(SignalGeneratorInterface $signal_generator) {
		$this->signal_generator = $signal_generator;
		$this->initSignals();
	}

	/**
	 * @inheritdoc
	 */
	public function withEntry($button, $slate=null) {
		$clone = clone $this;
		if($slate) {
			$clone->slates[] = $slate;
			$button = $button->withOnClick($slate->getToggleSignal());
		}
		$clone->buttons[] = $button;
		return $clone;
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
