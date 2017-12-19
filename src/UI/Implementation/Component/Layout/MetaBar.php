<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;

class MetaBar implements C\Layout\MetaBar {
	use ComponentHelper;

	/**
	 * @var
	 */
	private $logo;
	private $elements = array();


	public function __construct() {
		//$this->checkStringArg("string", $icon_path);
	}

	public function withLogo($logo) {
		$clone = clone $this;
		$clone->logo = $logo;
		return $clone;
	}

	public function getLogo() {
		return $this->logo;
	}


	public function withElement($element) {
		$clone = clone $this;
		$clone->elements[] = $element;
		return $clone;
	}

	public function getElements() {
		return $this->elements;
	}

}
