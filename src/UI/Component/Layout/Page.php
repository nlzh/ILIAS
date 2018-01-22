<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Component\Layout;
use ILIAS\UI\Component as C;

/**
 * This describes the Page
 */
interface Page extends C\Component {

	/**
	 * @return
	 */
	public function getContent();

	/**
	 * @param
	 * @return 	Page
	 */
	public function withContent($content);

	/**
	 * @param 	ILIAS\UI\Component\Layout\Metabar $metabar
	 * @return 	Page
	 */
	public function withMetabar(C\Layout\Metabar $metabar);

	/**
	 * @return 	ILIAS\UI\Component\Layout\Metabar
	 */
	public function getMetabar();

	/**
	 * @param 	ILIAS\UI\Component\Layout\Sidebar 	$sidebar
	 * @return 	Page
	 */
	public function withSidebar(C\Layout\Sidebar $sidebar);

	/**
	 * @return 	ILIAS\UI\Component\Layout\Sidebar
	 */
	public function getSidebar();
}