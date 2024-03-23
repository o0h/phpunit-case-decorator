<?php

declare(strict_types=1);

namespace ExampleApp;

use SplFixedArray;

class ArrayUtil
{
    public static function fix(array $data): SplFixedArray
    {
        return SplFixedArray::fromArray($data);
    }
}
