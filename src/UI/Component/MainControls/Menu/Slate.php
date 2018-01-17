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
	 * @param 	bool 	$state
	 * @return 	Slate
	 */
	public function withActive($state);

	/**
	 * @return 	bool
	 */
	public function getActive();

	/**
	 * @param 	string | Signal		$action
	 * @return 	Slate
	 */
	//public function withBacklinkAction($action);

	/**
	 * @return 	string | Signal
	 */
	//public function getBacklinkAction();


	/**
	 * @return 	Signal
	 */
	//public function getReplaceContentSignal();




	/**
	 * @return 	Slate
	 */
	public function withResetSignals();

	/**
	 * @return 	Signal
	 */
	public function getToggleSignal();
}