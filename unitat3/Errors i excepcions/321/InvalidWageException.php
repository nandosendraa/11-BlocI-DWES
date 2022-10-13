<?php

class InvalidWageException extends Exception
{
    protected string $error;
    public function __construct(string $string)
    {
        parent::__construct($string);
    }
}