<?php

namespace App\Model;

use App\Exceptions\InvalidNameException;

class Person
{
    private $name;
    private $cpf;

    public function __construct(CPF $cpf, string $name)
    {
        $this->validateName($name);

        $this->cpf = $cpf;
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): Person
    {
        $this->name = $name;

        return $this;
    }

    public function getCpf(): string
    {
        return $this->cpf->getNumber();
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    private function validateName(string $name): void
    {
        if (strlen($name) < 5) {
            throw new InvalidNameException($name);
        }
    }
}
