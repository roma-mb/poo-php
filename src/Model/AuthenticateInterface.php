<?php

namespace App\Model;

interface AuthenticateInterface
{
    public function validate(string $password): bool;
}