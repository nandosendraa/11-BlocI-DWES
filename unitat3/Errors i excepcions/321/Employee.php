<?php
include "InvalidWageException.php";
class Employee {
    private string $name;
    private string $surname;
    private int $salary;
    private array $phones;
    const MAX_SALARY = 3333;

    public function __construct($name, $surname, ?int $salary = 1000) {
        $this->name = $name;
        $this->surname = $surname;
        if($salary >= 1000)
            $this->salary = $salary;
        if($salary<0){
            throw new InvalidWageException(" El salari no pot ser negatiu");
        }
    }
    public function getFullname(): string{
        return $this->name . " " . $this->surname;
    }
    public function mustPayTaxes(): bool {
        if($this->salary > self::MAX_SALARY)
            return true;
        return false;
    }
    public function addPhone(string $phone): void{
        $this->phones[] = $phone;
    }
    public function listPhones(): string {
        $resultado = "";
        foreach ($this->phones as $valor){
            $resultado .= $valor . ",";
        }
        return $resultado;
    }
    public function emptyPhones(): void {
        foreach ($this->phones as $index => $valor){
            unset($valor[$index]);
        }
    }
    public function listaOrdenada(Employee $emp):string{
        $resultado = "";
        foreach ($this->phones as $element){
            $resultado .= "<li>" . $element . "</li>";
        }
        return $resultado;
    }
    public static function toHtml(Employee $emp): string {
        return "<p>" . $emp->getFullName() . "</p>" . "<p>" . $emp->getSalary() . "</p>" . "<ol>" . $emp->listaOrdenada($emp) . "</ol>";
    }

    /**
     * @return array
     */
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }/**
 * @param string $name
 */
    public function setName(string $name): void
    {
        $this->name = $name;
    }/**
 * @return string
 */
    public function getSurname(): string
    {
        return $this->surname;
    }/**
 * @param string $surname
 */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }/**
 * @return int
 */
    public function getSalary(): int
    {
        return $this->salary;
    }/**
 * @param int $salary
 */
    public function setSalary(int $salary): void
    {
        $this->salary = $salary;
    }
}