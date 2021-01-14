<?php

namespace App\Service;

use App\Model\AuthenticateInterface;

class Authenticate
{
    public function login(AuthenticateInterface $authenticateInterface, string $password)
    {
       if ($authenticateInterface->validate($password)) {
           echo 'Usuário autenticado.' . PHP_EOL;
           return;
       }
    
       echo 'Senha incorreta.' . PHP_EOL;
    }
}