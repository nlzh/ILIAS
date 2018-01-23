<?php

require_once 'tests/UI/AbstractFactoryTest.php';

use \ILIAS\UI\Component as C;

/**
 * Tests on factory implementation for main controls
 *
 * @author Nils Haagen <nhaagen@concepts-and-training.de>
 */
class MainControlsFactoryTest extends AbstractFactoryTest {

	public $kitchensink_info_settings = array
		(
			"prompts" => array(
					"context" => false,
					"rules" => false //2do
			),
			"menu" => array(
					"context" => false,
					"rules" => false //2do
			)
	);
	public $factory_title = 'ILIAS\\UI\\Component\\MainControls\\Factory';
}
