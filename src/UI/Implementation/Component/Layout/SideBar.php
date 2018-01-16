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
	 * @var SignalGeneratorInterface
	 */
	private $signal_generator;

	/**
	 * @var Signal
	 */
	private $entry_click_signal;

	/**
	 * @var \ILIAS\UI\Component\Layout\SidebarEntry[]
	 */
	private $entries;

	/**
	 * @var string
	 */
	private $active_entry;


	public function __construct(
			SignalGeneratorInterface $signal_generator,
			array $entries,	$active = null) {
		$this->signal_generator = $signal_generator;
		$this->initSignals();

		$this->entries = $entries;
		$this->active_entry = $active;
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
	public function getEntries() {
		return $this->entries;
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
	public function withActive($active) {
		$this->checkStringArg("active", $active);
		$clone = clone $this;
		$clone->active_entry =$active;
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getActive() {
		return $this->active_entry;
	}



}
