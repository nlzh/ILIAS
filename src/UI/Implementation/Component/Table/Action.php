<?php declare(strict_types=1);

namespace ILIAS\UI\Implementation\Component\Table;

use ILIAS\UI\Component\Table as T;
use ILIAS\UI\Component\Signal;
use ILIAS\Data\URI;

//abstract class Action implements T\Action
class Action implements T\Action
{
    protected $label;
    protected $parameter;
    protected $target;
    protected $parameter_name;

    public function __construct(
        string $label,
        string $parameter_name,
        $target,
        $scope = T\Action::SCOPE_BOTH
    ) {
        $this->label = $label;
        $this->parameter_name = $parameter_name;

        if( ! ($target instanceof URI || $target instanceof Signal)) {
            throw new \InvalidArgumentException("target must be URL or Signal",1);
        }
        $this->target = $target;

        if(! in_array($scope, [
            T\Action::SCOPE_BOTH,
            T\Action::SCOPE_SINGLE,
            T\Action::SCOPE_MULTI
        ])) {
            throw new \InvalidArgumentException("not a valid action-scope",1);
        }
        $this->scope = $scope;
    }

    public function getLabel() : string
    {
        return $this->label;
    }

    public function getParameterName() : string
    {
        return $this->parameter_name;
    }

    /*
     * @inheritdoc
     */
    public function getTarget()
    {
        return $this->target;
    }

    final public function getScope()
    {
        return $this->scope;
    }

}
