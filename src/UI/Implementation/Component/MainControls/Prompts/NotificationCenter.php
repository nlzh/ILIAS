<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Prompts;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;

/**
 * Notification Center
 */
class NotificationCenter implements C\MainControls\Prompts\NotificationCenter {
	use ComponentHelper;

	/**
	 * @var array<ILIAS\UI\Component\Glyph\Glyph, string>
	 */
	protected $entries;

	/**
	 * @inheritdoc
	 */
	public function getEntries(){
		return $this->entries;
	}

	/**
	 * @inheritdoc
	 */
	public function withEntry(\ILIAS\UI\Component\Glyph\Glyph $glyph, $label) {
		$this->checkStringArg('label', $label);
		$clone = clone $this;
		$clone->entries[] = array($glyph, $label);
		return $clone;
	}

}
