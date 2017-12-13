<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout;

use ILIAS\UI\Component\Layout as Layout;

class Factory implements Layout\Factory {
	/**
	 * @inheritdoc
	 */
	public function page(){
		return new Page\Factory();
	}
}
