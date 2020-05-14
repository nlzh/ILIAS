<?php declare(strict_types=1);

/* Copyright (c) 2020 Nils Haagen <nils.haagen@concepts-and-training.de> Extended GPL, see docs/LICENSE */

namespace ILIAS\UI\Implementation\Component\Table;

use ILIAS\UI\Component\Table as T;

class RowFactory implements T\RowFactory
{
    /**
     * @var string[]
     */
    protected $col_ids;

    public function __construct(array $col_ids)
    {
        $this->col_ids = $col_ids;
    }

    public function standard(string $id, array $record) : T\Row
    {
        $row = [];
        foreach ($this->col_ids as $col_id) {
            $row[$col_id] = '';
            if (array_key_exists($col_id, $record)) {
                $row[$col_id] = $record[$col_id];
            }
        }
        return $row;
    }
}
