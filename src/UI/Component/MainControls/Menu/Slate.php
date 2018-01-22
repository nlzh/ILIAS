<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\MainControls\Menu;
use ILIAS\UI\Component\JavaScriptBindable;

/**
 * This describes the Slate
 */
interface Slate extends \ILIAS\UI\Component\Component, JavaScriptBindable {

	/**
	 * @return 	Plank[]
	 */
	public function getPlanks();

	/**
	 * @param 	Plank[] 	$planks
	 * @return 	Slate
	 */
	public function withPlanks(array $planks);

	/**
	 * @param 	bool 	$state
	 * @return 	Slate
	 */
	public function withActive($state);

	/**
	 * @return 	bool
	 */
	public function getActive();

	/**
	 * @return 	Slate
	 */
	public function withResetSignals();

	/**
	 * Hand over the Signal that should be fired when clicking the close-button.
	 * @param 	Signal 	$signal
	 * @return 	Slate
	 */
	public function withCloseSignal($signal);

	/**
	 * This is fired by the close-button.
	 * @return 	Signal
	 */
	public function getCloseSignal();

	/**
	 * @return 	Signal
	 */
	public function getToggleSignal();

	/**
	 * Use this to change the contents of the slate.
	 * @return 	Signal
	 */
	public function getReplaceContentSignal();

	/**
	 * This is the Signal that is triggered by the back-button.
	 * @return 	Signal
	 */
	public function getNavigateBackSignal();

}