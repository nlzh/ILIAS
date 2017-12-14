<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component\MainControls\Menu as Menu;

class Factory implements Menu\Factory {
	/**
	 * @inheritdoc
	 */
	public function slate(\ILIAS\UI\Component\Button\Iconographic $button, array $planks){
		return new Slate($button, $planks);
	}
	/**
	 * @inheritdoc
	 */
	public function plank(){
		return new Plank();
	}
}
