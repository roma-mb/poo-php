<?php

namespace App\Exceptions;

class InsufficientFundsException extends \DomainException
{
    public function __construct(float $value, float $balance)
    {
        $message = "[ Saldo insucifiente ] - Valor solicitado R$: {$value}, Saldo atual R$: {$balance}";
        parent::__construct($message);
    }
}
