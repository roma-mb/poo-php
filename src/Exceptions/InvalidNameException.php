<?php

declare(strict_types=1);

namespace App\Exceptions;

use DomainException;

class InvalidNameException extends DomainException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}
