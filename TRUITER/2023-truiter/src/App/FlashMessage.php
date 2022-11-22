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
    public static function get(string $key, $defaultValue = 'ye'):mixed
    {
        if ( !key_exists($key,$_SESSION[self::SESSION_KEY]))
            return $defaultValue;
        return $_SESSION[self::SESSION_KEY][$key];
    }

    public static function set(string $key, $value):void
    {
        $_SESSION[self::SESSION_KEY][$key] = $value;
    }

    public static function unset(string $key):void
    {
        unset($_SESSION[self::SESSION_KEY][$key]);
    }
}