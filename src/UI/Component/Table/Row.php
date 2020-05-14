<?php declare(strict_types=1);

namespace ILIAS\UI\Component\Table;

interface Row
{
    public function getId() : string;
    public function withDisabledAction(string $action_id, bool $disable = true) : Row;
}
