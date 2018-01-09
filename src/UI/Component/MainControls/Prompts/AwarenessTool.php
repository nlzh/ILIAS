<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\MainControls\Prompts;

/**
 * This describes the AwarenessTool
 */
interface AwarenessTool extends \ILIAS\UI\Component\Component {

	/**
	 * @return \ILIAS\UI\Component[]
	 */
	public function getContents();

	/**
	 * @param \ILIAS\UI\Component[]
	 * @return AwarenessTool
	 */
	public function withContents($contents);

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