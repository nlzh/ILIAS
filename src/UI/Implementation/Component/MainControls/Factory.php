<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls;

use ILIAS\UI\Component\MainControls as MC;

class Factory implements MC\Factory {
	/**
	 * @inheritdoc
	 */
	public function menu(){
		return new Menu\Factory();
	}
	/**
	 * @inheritdoc
	 */
	public function prompts(){
		//return new Menu\Factory();
	}
}
