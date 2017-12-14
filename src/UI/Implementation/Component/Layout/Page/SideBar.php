<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout\Page;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;

class SideBar implements C\Layout\Page\SideBar {
	use ComponentHelper;
	use JavaScriptBindable;

	/**
	 * @var Slate[]
	 */
	private $slates;


	public function __construct($slates) {
		$this->slates = $slates;
	}

	public function getSlates() {
		return $this->slates;
	}




}
