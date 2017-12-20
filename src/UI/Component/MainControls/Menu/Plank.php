<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\MainControls\Menu;
use ILIAS\UI\Component\JavaScriptBindable;

/**
 * This describes the Plank
 */
interface Plank extends \ILIAS\UI\Component\Component, JavaScriptBindable {

	/**
	 * @param string 	$title
	 * @return Plank
	 */
	public function withTitle($title);

	/**
	 * @return string
	 */
	public function getTitle();

	/**
	 * @param mixed 	$element
	 * @return Plank
	 */
	public function withElement($element);

	/**
	 * @return
	 */
	public function getElements();

	/**
	 * @param bool 	$expand
	 * @return Plank
	 */
	public function withStaticExpansion($expand=false);

	/**
	 * @return bool
	 */
	public function getStaticExpanded();

	/**
	 * @return Plank
	 */
	public function withResetSignals();

	/**
	 * @return Signal
	 */
	public function getToggleSignal();

}