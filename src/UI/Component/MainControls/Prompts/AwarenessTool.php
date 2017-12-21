<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\MainControls\Prompts;

/**
 * This describes the AwarenessTool
 */
interface AwarenessTool extends \ILIAS\UI\Component\Component {

	/**
	 * @return \ILIAS\UI\Component\Popover\Standard
	 */
	public function getPopover();

	/**
	 * @param \ILIAS\UI\Component\Popover\Standard 	$popover
	 * @return AwarenessTool
	 */
	public function withPopover(\ILIAS\UI\Component\Popover\Standard $popover);

	/**
	 * @return int
	 */
	public function getCounter();

	/**
	 * @param int 	$count
	 * @return AwarenessTool
	 */
	public function withCounter($count);
}