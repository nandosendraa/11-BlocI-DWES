<?php
class Employee{
    const MAX_SALARY = 3333;
    public string $name;
    public string $lastname;
    public string $salary;
    private array $phones;

    function __construct0($nm,$lnm,$sl){
        $this->setName($nm);
        $this->setLastname($lnm);
        $this->setSalary($sl);
    }

    function __construct1($nm,$lnm){
        $this->setName($nm);
        $this->setLastname($lnm);
        $this->setSalary("1000");
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
    public function getSalary(): string{
        return $this->salary;
    }
    public function setSalary(string $salary): void{
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
        foreach ($this->phones as $phone){
            $listedPhones =+ $phone."," ;
        }
        return $listedPhones;
    }
    public function emptyPhones(): void{
        $this->phones=[];
    }
}
