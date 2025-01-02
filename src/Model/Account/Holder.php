<?php

declare(strict_types=1);

namespace App\Model\Account;

use App\Model\Accessors;
use App\Model\Person;
use App\Model\Address;
use App\Model\AuthenticateInterface;
use App\Model\CPF;

class Holder extends Person implements AuthenticateInterface
{
    use Accessors;

    public function __construct(
        private CPF $cpf,
        private string $name,
        private readonly Address $address
    )
    {
        parent::__construct($cpf, $name);
    }

    public function validate(string $password): bool
    {
        return $password === '@holder';
    }
}
