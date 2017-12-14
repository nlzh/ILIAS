<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;

class Slate implements C\MainControls\Menu\Slate {
	use ComponentHelper;

	/**
	 * @var \ILIAS\UI\Component\Button\Iconographic
	 */
	private $button;

	/**
	 * @var Plank[]
	 */
	private $planks;


	public function __construct(\ILIAS\UI\Component\Button\Iconographic $button, array $planks) {
		$this->button = $button;
		$this->planks = $planks;
	}

	public function getButton() {
		return $this->button;
	}
	public function getPlanks() {
		return $this->planks;
	}


}
