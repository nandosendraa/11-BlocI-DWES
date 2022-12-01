<?php

namespace App\Helpers;

use InvalidArgumentException;

class Validator
{

    static function lengthBetween(string $value,int $min,int $max, string $message = ''): bool {

        if (strlen($value) >= $min && strlen($value)<=$max)
            return true;

        if (empty($message))
            $message = "El valor (%s) deu tindre entre %d i %d caracters";
        throw new InvalidArgumentException($message);
    }
    static function regex(string $value,string $pattern, string $message = ''): bool{
        if (preg_match($pattern,$value))
            return true;

        if (empty($message))
            $message = "El format de %s no es correcte";
        throw new InvalidArgumentException($message);
    }
}