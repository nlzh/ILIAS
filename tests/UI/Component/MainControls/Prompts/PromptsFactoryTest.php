<?php

require_once 'tests/UI/AbstractFactoryTest.php';

/**
 * Tests on factory implementation for prompts
 *
 * @author Nils Haagen <nhaagen@concepts-and-training.de>
 */
class PromptsFactoryTest extends AbstractFactoryTest {

	public $kitchensink_info_settings = array
		(
			"notificationCenter" => array(
					"context" => false,
					"rules" => false //2do
			),
			"awarenessTool" => array(
					"context" => false,
					"rules" => false //2do
			)
	);
	public $factory_title = 'ILIAS\\UI\\Component\\MainControls\\Prompts\\Factory';
}
