<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\MainControls\Menu;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;

class Plank implements C\MainControls\Menu\Plank {
	use ComponentHelper;

	/**
	 * @var
	 */
	private $content;


	public function __construct($content) {
		//$this->checkStringArg("string", $icon_path);
		$this->content = $content;
	}

	public function getContent() {
		return $this->content;
	}

}
