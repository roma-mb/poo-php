<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\AuthenticateInterface;
use DomainException;

class Authenticate
{
    public function login(AuthenticateInterface $authenticateInterface, string $password): void
    {
       if ($authenticateInterface->validate($password)) {
           echo "[ Authenticated User: {$authenticateInterface->getName()}]" . PHP_EOL;
           return;
       }
    
       throw new DomainException('Incorrect password...');
    }
}