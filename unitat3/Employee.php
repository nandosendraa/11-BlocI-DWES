<?php

class Employee{
    const MAX_SALARY = 3333;
    public static string $name;
    public static string $lastname;
    public static string $salary;
    private static array $phones;

    function __construct($nm,$lnm,$sl=1000){
        $this->setName($nm);
        $this->setLastname($lnm);
        $this->setSalary($sl);
    }

    public static function getName(): string{
        return self::$name;
    }
    public function setName(string $name): void{
        self::$name = $name;
    }
    public static function getLastname(): string{
        return self::$lastname;
    }
    public function setLastname(string $lastname): void{
        self::$lastname = $lastname;
    }
    public static function getSalary(): string{
        return self::$salary;
    }
    public function setSalary(string $salary): void{
        self::$salary = $salary;
    }
    public static function  getFullname(): string{
        return self::$name." ".self::$lastname;
    }
    public function mustPayTaxes(): bool{
        if (self::$salary > self::MAX_SALARY)
            return true;
        else
            return false;
    }
    public static function addPhone(string $phone): void{
        self::$phones[]=$phone;
    }

    public static function listPhones(): string{
        if (count(self::$phones)==1)
            return self::$phones[0];
            return implode(', ',self::$phones);
    }
    public function emptyPhones(): void{
        self::$phones=[];
    }

    public static function toHtml (Employee $emp): string{
        $html =
         "<ol>".
         "<li>".Employee::getFullName()."</li>".
         "<li>".Employee::getLastName()."</li>".
         "<li>".Employee::getSalary()."</li>".
         "<li>".Employee::listPhones()."</li>".
         "</ol>";

        return $html;
    }
}
