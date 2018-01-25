<?php

require_once 'tests/UI/AbstractFactoryTest.php';

/**
 * Tests on factory implementation for menu
 *
 * @author Nils Haagen <nhaagen@concepts-and-training.de>
 */
class MenuFactoryTest extends AbstractFactoryTest {

	public $kitchensink_info_settings = array
		(
			"slate" => array(
					"context" => false,
					"rules" => false //2do
			),
			"plank" => array(
					"context" => false,
					"rules" => false //2do
			)
	);
	public $factory_title = 'ILIAS\\UI\\Component\\MainControls\\Menu\\Factory';
}
