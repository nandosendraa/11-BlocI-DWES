<?php
declare(strict_types=1);
class Employee{
    const MAX_SALARY = 3333;
    public string $name;
    public string $lastname;
    public int $salary;
    private array $phones;

    function __construct(string $name,string $lastname,int $salary=1000){
        $this->setName($name);
        $this->setLastname($lastname);
        $this->setSalary($salary);
    }

    public function getName(): string{
        return $this->name;
    }
    public function setName(string $name): void{
        $this->name = $name;
    }
    public function getLastname(): string{
        return $this->lastname;
    }
    public function setLastname(string $lastname): void{
        $this->lastname = $lastname;
    }
    public function getSalary(): int{
        return $this->salary;
    }
    public function setSalary(int $salary): void{
        $this->salary = $salary;
    }
    public function  getFullname(): string{
        return $this->name." ".$this->lastname;
    }
    public function mustPayTaxes(): bool{
        if ($this->salary > self::MAX_SALARY)
            return true;
        else
            return false;
    }
    public function addPhone(string $phone): void{
        $this->phones[]=$phone;
    }

    public function listPhones(): string{
        if (count($this->phones)==1)
            return $this->phones[0];
        return implode(', ',$this->phones);
    }
    public function emptyPhones(): void{
        $this->phones=[];
    }

    public static function toHtml (Employee $emp): string{
        $html =
            "<ol>".
            "<li>".$emp->getFullName()."</li>".
            "<li>".$emp->getLastName()."</li>".
            "<li>".$emp->getSalary()."</li>".
            "<li>".$emp->listPhones()."</li>".
            "</ol>";

        return $html;
    }
}
