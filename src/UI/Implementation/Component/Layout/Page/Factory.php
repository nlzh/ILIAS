<?php
/* Copyright (c) 2017 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Layout\Page;

use ILIAS\UI\Component\Layout\Page as Page;
use ILIAS\UI\Implementation\Component\SignalGeneratorInterface;

class Factory implements Page\Factory {
	/**
	 * @var SignalGeneratorInterface
	 */
	protected $signal_generator;

	/**
	 * @param SignalGeneratorInterface $signal_generator
	 */
	public function __construct(SignalGeneratorInterface $signal_generator) {
		$this->signal_generator = $signal_generator;
	}

	/**
	 * @inheritdoc
	 */
	public function topbar(){
		return new TopBar();
	}
	/**
	 * @inheritdoc
	 */
	public function sidebar(array $buttons, array $slates){
		return new SideBar($buttons, $slates, $this->signal_generator);
	}
}
