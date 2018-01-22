<?php
/* Copyright (c) 2018 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\Layout;
use \ILIAS\UI\Component as C;

/**
 * This describes the SidebarEntry.
 */
interface SidebarEntry extends C\Component {

	/**
	 * @return 	ILIAS\UI\Component\Button\Iconographic
	 */
	public function getButton();

	/**
	 * @return 	ILIAS\UI\Component\MainControls\Menu\Slate
	 */
	public function getSlate();

}
