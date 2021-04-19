<?php

namespace V1V2;

use Elao\Enum\Enum;

final class Stage extends Enum
{
    public const ONE = '1';
    public const TWO = '2';

    public static function values(): array
    {
        return [
            self::ONE,
            self::TWO
        ];
    }
}
