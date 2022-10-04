<?php

class Employee{
    public string $name;
    public string $lastname;
    public string $salary;
    private array $phones;

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
        if ($this->salary > 3333)
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
        foreach ($this->phones as $phone){
            unset($phone);
        }
    }
}