<?php

declare(strict_types=1);

namespace ExampleApp;

class StringUtil
{
    public static function reverse(string $string): string
    {
        $length = mb_strlen($string);
        $result = '';
        for ($i = $length; $i >= 0; $i--) {
            $result .= $string[$i];
        }

        return $result;
    }
}
