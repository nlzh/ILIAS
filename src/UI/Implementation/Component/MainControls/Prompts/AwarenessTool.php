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
	 * @var ILIAS\UI\Component[]
	 */
	private $contents = array();
	/**
	 * @var int
	 */
	private $count;


	/**
	 * @inheritdoc
	 */
	public function getContents() {
		return $this->contents;
	}

	/**
	 * @inheritdoc
	 */
	public function withContents($contents) {
		$clone = clone $this;
		$clone->contents = $contents;
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
