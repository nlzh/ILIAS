<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

/**
 * SideBar
 */
class SideBar implements C\Layout\SideBar {
	use ComponentHelper;
	use JavaScriptBindable;

	/**
	 * @var array<Button\Iconographic | Glyph\Glyph>
	 */
	private $buttons;

	/**
	 * @var ILIAS\UI\Component\MainControls\Menu\Slate[]
	 */
	private $slates = [];

	/**
	 * @var SignalGeneratorInterface
	 */
	private $signal_generator;

	/**
	 * @var Signal
	 */
	private $entry_click_signal;

	/**
	 * @var string
	 */
	private $active_entry;




	public function __construct(SignalGeneratorInterface $signal_generator) {
		$this->signal_generator = $signal_generator;
		$this->initSignals();
	}

	/**
	 * @inheritdoc
	 */
	public function withEntry($identifier, $button, C\MainControls\Menu\Slate $slate=null) {
		$clone = clone $this;
		if($slate) {
			$clone->slates[$identifier] = $slate;
			$button = $button->withOnClick($slate->getToggleSignal());
		}
		$clone->buttons[$identifier] = $button;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getButtons() {
		return $this->buttons;
	}

	/**
	 * @inheritdoc
	 */
	public function getSlates() {
		return $this->slates;
	}

	/**
	 * @inheritdoc
	 */
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

	/**
	 * @inheritdoc
	 */
	public function withActive($identifier) {
		$this->checkStringArg("identifier", $identifier);
		$clone = clone $this;
		$clone->active_entry =$identifier;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getActive() {
		return $this->active_entry;
	}



}
