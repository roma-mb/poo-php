<?php

namespace App\Model\Account;

use App\Model\Person;
use App\Model\Address;
use App\Model\AuthenticateInterface;
use App\Model\CPF;

class Holder extends Person implements AuthenticateInterface
{
    private $addres;

    public function __construct(CPF $cpf, string $name, Address $addres)
    {
        parent::__construct($cpf, $name);
        $this->addres = $addres;
    }

    public function validate(string $password): bool
    {
        return $password === '@holder';
    }
}
