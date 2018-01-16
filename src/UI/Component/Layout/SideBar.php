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
	 * @return \ILIAS\UI\Component\Layout\SidebarEntry[]
	 */
	public function getEntries();

	/**
	 * @return Signal
	 */
	public function getEntryClickSignal();

	/**
	 * @return SideBar
	 */
	public function withResetSignals();

	/**
	 * This entry is set to active.
	 * @param string 	$identifier
	 * @return SideBar
	 */
	public function withActive($identifier);

	/**
	 * This is the identifer of the active entry.
	 * @return string
	 */
	public function getActive();

}