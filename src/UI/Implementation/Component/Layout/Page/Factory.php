<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout\Page;

use ILIAS\UI\Component\Layout\Page as Page;

class Factory implements Page\Factory {
	/**
	 * @inheritdoc
	 */
	public function topbar(){
		return new TopBar();
	}
	/**
	 * @inheritdoc
	 */
	public function sidebar(array $slates){
		return new SideBar($slates);
	}
}
