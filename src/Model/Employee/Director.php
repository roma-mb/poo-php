<?php

declare(strict_types=1);

namespace App\Model\Employee; 

use App\Model\AuthenticateInterface;
use App\Model\Employee\Employee;

class Director Extends Employee implements AuthenticateInterface
{
    public function calculationPremium(): float
    {
        return $this->getSalary() * 2;
    }

    public function validate(string $password): bool
    {
        return $password === '@director';
    }
}
