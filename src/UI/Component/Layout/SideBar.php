<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\Layout;
use ILIAS\UI\Component\JavaScriptBindable;
use \ILIAS\UI\Component as C;

/**
 * This describes the SideBar
 */
interface SideBar extends C\Component, JavaScriptBindable {

	/**
	 * @param C\Button\Iconographic | C\Glyph\Glyph 	$button
	 * @param C\MainControls\Menu\Slate | null 	$slate
	 * @return SideBar
	 */
	public function withEntry($button, C\MainControls\Menu\Slate $slate=null);

	/**
	 * @return ILIAS\UI\Component\Button\Iconographic[]
	 */
	public function getButtons();

	/**
	 * @return ILIAS\UI\Component\MainControls\Menu\Slate[]
	 */
	public function getSlates();

	/**
	 * @return Signal
	 */
	public function getEntryClickSignal();

	/**
	 * @return SideBar
	 */
	public function withResetSignals();

}