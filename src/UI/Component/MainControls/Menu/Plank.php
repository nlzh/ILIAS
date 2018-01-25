<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\MainControls\Menu;
use ILIAS\UI\Component\JavaScriptBindable;

/**
 * This describes the Plank
 */
interface Plank extends \ILIAS\UI\Component\Component, JavaScriptBindable {

	/**
	 * @param Component[] 	$contents
	 * @return Plank
	 */
	public function withContents(array $contents);

	/**
	 * @return 	Component[]
	 */
	public function getContents();


	/**
	 * @return 	Plank
	 */
	public function withResetSignals();

	/**
	 * @return 	Signal
	 */
	//public function getToggleSignal();

}