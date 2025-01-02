<?php

declare(strict_types=1);

namespace App\Model;

interface AuthenticateInterface
{
    public function validate(string $password): bool;
}
