<?php

namespace App\Exceptions;

use DomainException;

class InvalidNameException extends DomainException
{
    public function __construct(string $name)
    {
        $messgage = "Nome: {$name} inválido, o mesmo precisa conter pelo menos 5 caracteres";
        parent::__construct($messgage);
    }

    public function test()
    {
    }
}
