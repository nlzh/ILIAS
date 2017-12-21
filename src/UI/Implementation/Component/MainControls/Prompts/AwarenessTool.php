<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Prompts;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;

/**
 * AwarenessTool
 */
class AwarenessTool implements C\MainControls\Prompts\AwarenessTool {
	use ComponentHelper;

	/**
	 * @var ILIAS\UI\Component\Popover[]
	 */
	private $popover;
	/**
	 * @var int
	 */
	private $count;


	public function __construct(\ILIAS\UI\Component\Popover\Standard $popover) {
		$this->popover = $popover->withVerticalPosition();
	}

	/**
	 * @inheritdoc
	 */
	public function getPopover() {
		return $this->popover;
	}

	/**
	 * @inheritdoc
	 */
	public function withPopover(\ILIAS\UI\Component\Popover\Standard $popover) {
		$clone = clone $this;
		$clone->popover = $popover->withVerticalPosition();
		return $clone;
	}

	/**
	 * @inheritdoc
	 */
	public function getCounter() {
		return $this->count;
	}

	/**
	 * @inheritdoc
	 */
	public function withCounter($count) {
		$clone = clone $this;
		$clone->count = $count;
		return $clone;
	}


}
