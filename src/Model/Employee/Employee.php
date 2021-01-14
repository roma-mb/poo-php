<?php

namespace App\Model\Employee;

use App\Model\CPF;
use App\Model\Person;

abstract class Employee extends Person
{
    private $salary;

    public function __construct(CPF $cpf, string $name, float $salary)
    {
        parent::__construct($cpf, $name);
        $this->salary = $salary;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
    
    public function setSalary($salary): Employee
    {
        $this->salary = $salary;
        
        return $this;
    }

    public function changeName(string $name): void
    {
        $this->setName($name);
    }

    public function getEmployeeName(): string
    {
        return $this->getName();
    }

    abstract public function calculationPremium(): float;
}
