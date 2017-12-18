<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout;

use ILIAS\UI\Component as C;
use ILIAS\UI\Implementation\Component\ComponentHelper;

class Page implements C\Layout\Page {
	use ComponentHelper;

	public function __construct($content) {
		$this->content = $content;
	}

	public function getContent() {
		return $this->content;
	}

	public function withContent($content) {
		$clone = clone $this;
		$clone->content = $content;
		return $clone;

	}

	public function withMetabar(MetaBar $metabar) {
		$clone = clone $this;
		$clone->metabar = $metabar;
		return $clone;
	}

	public function getMetabar() {
		return $this->metabar;
	}

	public function withSidebar(SideBar $sidebar) {
		$clone = clone $this;
		$clone->sidebar = $sidebar;
		return $clone;
	}

	public function getSidebar() {
		return $this->sidebar;
	}
}
