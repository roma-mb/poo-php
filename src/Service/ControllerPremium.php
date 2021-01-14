<?php

use App\Model\Employee\Employee;

class ControllerPremium
{
    private $total;

    public function add(Employee $employee)
    {
        $this->total += $employee->calculationPremium()->getSalary();
    }

    public function getTotal()
    {
        return $this->total;
    }
}