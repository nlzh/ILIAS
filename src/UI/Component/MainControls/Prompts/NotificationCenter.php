<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\MainControls\Prompts;

/**
 * This describes the NotificationCenter
 */
interface NotificationCenter extends \ILIAS\UI\Component\Component{

	/**
	 * @return array<ILIAS\UI\Component\Glyph\Glyph, string>
	 */
	public function getEntries();

	/**
	 * @param \ILIAS\UI\Component\Glyph\Glyph 	$glyph
	 * @param string 	$label
	 * @return NotificationCenter
	 */
	public function withEntry(\ILIAS\UI\Component\Glyph\Glyph $glyph, $label);
}