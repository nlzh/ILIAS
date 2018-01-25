<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\Layout;
use ILIAS\UI\Component\JavaScriptBindable;
use \ILIAS\UI\Component as C;

/**
 * This describes the Sidebar
 */
interface Sidebar extends C\Component, JavaScriptBindable {

	/**
	 * @return 	\ILIAS\UI\Component\Layout\SidebarEntry[]
	 */
	public function getEntries();

	/**
	 * @return 	Signal
	 */
	public function getEntryClickSignal();

	/**
	 * @return 	Sidebar
	 */
	public function withResetSignals();

	/**
	 * Th entry at this position is set to active.
	 * @param 	int 	$active
	 * @return 	Sidebar
	 */
	public function withActive($active);

	/**
	 * This is the index of the active entry.
	 * @return 	int
	 */
	public function getActive();

}