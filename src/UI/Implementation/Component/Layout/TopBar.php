<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;

class TopBar implements C\Layout\TopBar {
	use ComponentHelper;

	/**
	 * @var
	 */
	private $x;


	public function __construct() {
		//$this->checkStringArg("string", $icon_path);
	}


}
