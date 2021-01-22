<?php

namespace App\Service;

use App\Model\AuthenticateInterface;
use DomainException;

class Authenticate
{
    public function login(AuthenticateInterface $authenticateInterface, string $password)
    {
       if ($authenticateInterface->validate($password)) {
           echo '[ Usuário autenticado. ]' . PHP_EOL;
           return;
       }
    
       throw new DomainException('Senha incorreta...');
    }
}