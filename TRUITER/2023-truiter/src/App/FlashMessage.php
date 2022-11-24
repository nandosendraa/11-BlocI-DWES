<?php

namespace App;

class FlashMessage
{
    const SESSION_KEY = "flash-message";
    /**
     * obtenim el valor de l'array associat a la clau.
     * després de llegir-lo l'esborrem
     * si no existeix tornem el valor indicat per defecte.
     * @param string $key
     * @param mixed $defaultValue
     * @return mixed|string
     */
    public static function get(string $key, $defaultValue = ''):mixed
    {
        $value = $_SESSION[self::SESSION_KEY][$key] ?? $defaultValue;
        self::unset($key);

        return $value;
    }

    public static function set(string $key, $value):void
    {
        $_SESSION[self::SESSION_KEY][$key] = $value;
    }

    private static function unset(string $key):void
    {
        unset($_SESSION[self::SESSION_KEY][$key]);
    }
}