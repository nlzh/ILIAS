<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component\MainControls\Menu as Menu;

class Factory implements Menu\Factory {
	/**
	 * @inheritdoc
	 */
	public function slate(){
		return new Slate();
	}
	/**
	 * @inheritdoc
	 */
	public function plank(){
		return new Plank();
	}
}
