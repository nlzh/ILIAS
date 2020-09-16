<?php declare(strict_types=1);

/* Copyright (c) 2020 Nils Haagen <nils.haagen@concepts-and-training.de>, Extended GPL, see docs/LICENSE */

namespace ILIAS\Refinery\KindlyTo\Transformation;

use ILIAS\Refinery\DeriveApplyToFromTransform;
use ILIAS\Refinery\Transformation;
use ILIAS\Refinery\ConstraintViolationException;

class NullTransformation implements Transformation
{
    use DeriveApplyToFromTransform;

    /**
     * @inheritdoc
     */
    public function transform($from)
    {
        if (is_null($from)) {
            return null;
        }
        if (is_string($from) && trim($from) === '') {
            return null;
        }
        throw new ConstraintViolationException(
            sprintf('The value "%s" could not be transformed into null', $from),
            'not_null',
            $from
        );
    }

    /**
     * @inheritdoc
     */
    public function __invoke($from)
    {
        return $this->transform($from);
    }

    public function accepts($value) : bool
    {
        return is_null($value) || (is_string($value) && trim($value) === '');
    }
}
