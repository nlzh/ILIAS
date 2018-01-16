<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;
use ILIAS\UI\Implementation\Component\JavaScriptBindable;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

/**
 * SideBar
 */
class SidebarEntry implements C\Layout\SidebarEntry {
	use ComponentHelper;
	//use JavaScriptBindable;

	/**
	 * @var Button\Iconographic | Glyph\Glyph
	 */
	private $button;

	/**
	 * @var ILIAS\UI\Component\MainControls\Menu\Slate
	 */
	private $slate;


	public function __construct($button, C\MainControls\Menu\Slate $slate=null) {
		$this->button = $button;
		$this->slate = $slate;

		if($slate) {
			$this->button = $button->withOnClick($slate->getToggleSignal());
		}
	}

	/**
	 * @inheritdoc
	 */
	public function getButton() {
		return $this->button;
	}

	/**
	 * @inheritdoc
	 */
	public function getSlate() {
		return $this->slate;
	}

}
