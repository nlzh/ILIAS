<?php declare(strict_types=1);

namespace ILIAS\UI\Implementation\Component\Table;

use ILIAS\UI\Component\Table as T;
use ILIAS\UI\Component\Signal;

abstract class Action implements T\Action
{
    protected $label;
    protected $parameter;
    protected $target;

    public function __construct(
        string $label,
        string $parameter,
        mixed $target,
        mixed $scope = T\Action::SCOPE_BOTH
    ) {
        $this->label = $label;
        $this->parameter = $parameter;

        if(in_array($scope, [
            T\Action::SCOPE_BOTH,
            T\Action::SCOPE_SINGLE,
            T\Action::SCOPE_MULTI
        ])) {
            throw new \InvalidArgumentException("not a valid action-scope",1);
        }
        $this->scope = $scope;

        if( ! is_string($target) ||
            ! $target instanceof Signal
        ) {
            throw new \InvalidArgumentException("target must be URL or Signal",1);
        }
        $this->target = $target;
    }

    public function applicable() : bool
    {
        return true;
    }

    public function scope() : mixed
    {
        return $this->scope;
    }

    final public function getLabel() : string
    {
        return $this->label;
    }

    final public function getParameterName() : string
        return $this->parameter;
    }

    final public function getTarget() {
        return $this->target;
    }

}
