<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout\Page;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;

class SideBar implements C\Layout\Page\SideBar {
	use ComponentHelper;

	/**
	 * @var
	 */
	private $x;


	public function __construct() {
		//$this->checkStringArg("string", $icon_path);
	}


}
