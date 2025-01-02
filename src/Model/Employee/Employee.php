<?php

declare(strict_types=1);

namespace App\Model\Employee;

use App\Model\CPF;
use App\Model\Person;

abstract class Employee extends Person
{
    public function __construct(protected CPF $cpf, protected string $name, private float $salary)
    {
        parent::__construct($cpf, $name);
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
