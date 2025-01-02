<?php

declare(strict_types=1);

namespace App\Model;

use App\Exceptions\InvalidNameException;
use App\langs\Lang;

class Person
{
    use Accessors;

    public function __construct(private CPF $cpf, private string $name)
    {
        $this->validateName($name);
    }

    public function getCpf(): string
    {
        return $this->cpf->getNumber();
    }

    public function setCpf($cpf): static
    {
        $this->cpf = $cpf;

        return $this;
    }

    private function validateName(string $name): void
    {
        if (strlen($name) < 5) {
            $message = Lang::get(message: 'messages.invalid_name', replace: [':name' => $name]);
            throw new InvalidNameException($message);
        }
    }
}
