<?php declare(strict_types=1);

namespace ILIAS\UI\Component\Table;

interface Action
{
    const SCOPE_BOTH = 1;
    const SCOPE_SINGLE = 2;
    const SCOPE_MULTI = 3;

    public function applicable() : bool;
    public function scope() : mixed;
    public function getId() : string;
    public function getLabel() : string;
    public function getParameterName() : string;
    /**
     * @return URL | Signal
     */
    public function getTarget();
}
