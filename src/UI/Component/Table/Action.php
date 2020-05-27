<?php declare(strict_types=1);

namespace ILIAS\UI\Component\Table;

interface Action extends \ILIAS\UI\Component\Component
{
    const SCOPE_BOTH = 1;
    const SCOPE_SINGLE = 2;
    const SCOPE_MULTI = 3;

    public function getLabel() : string;

    public function getParameterName() : string;

    /**
     * @return Data\URI | UI\Component\Signal
     */
    public function getTarget();

    public function getScope();
}
