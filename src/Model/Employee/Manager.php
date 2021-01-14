<?php

namespace App\Model\Employee;

use App\Model\AuthenticateInterface;
use App\Model\Employee\Employee;

class Manager extends Employee implements AuthenticateInterface
{
    public function calculationPremium(): float
    {
        return $this->getSalary();
    }

    public function validate(string $password): bool
    {
        return $password === '@manager';
    }
}
