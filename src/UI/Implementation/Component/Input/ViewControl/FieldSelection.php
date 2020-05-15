<?php

/* Copyright (c) 2020 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Input\ViewControl;

use ILIAS\UI\Component\Input\ViewControl\FieldSelection as FSInterface;
use ILIAS\UI\Component as C;
use ILIAS\UI\Component\Signal;


class FieldSelection extends ViewControl implements FSInterface
{
	protected $label;
	protected $button_label;
	protected $options;

	public function __construct(array $options, string $label, string $button_label)
	{
		$this->options = $options;
		$this->label = $label;
		$this->button_label = $button_label;
	}

	public function getOptions() : array
	{
		return $this->options;
	}

	public function getDropdownLabel() : string
	{
		return $this->label;
	}

	public function getButtonLabel() : string
	{
		return $this->button_label;
	}

}
