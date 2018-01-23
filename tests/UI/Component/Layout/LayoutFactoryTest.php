<?php

require_once 'tests/UI/AbstractFactoryTest.php';

use \ILIAS\UI\Component as C;

/**
 * Tests on factory implementation for layout
 *
 * @author Nils Haagen <nhaagen@concepts-and-training.de>
 */
class LayoutFactoryTest extends AbstractFactoryTest {

	public $kitchensink_info_settings = array
		(
			"metabar" => array(
					"context" => false,
					"rules" => false //2do
			),
			"sidebar" => array(
					"context" => false,
					"rules" => false //2do
			),
			"sidebarEntry" => array(
					"context" => false,
					"rules" => false //2do
			),
			"page" => array(
					"context" => false,
					"rules" => false //2do
			)
	);
	public $factory_title = 'ILIAS\\UI\\Component\\Layout\\Factory';
}
