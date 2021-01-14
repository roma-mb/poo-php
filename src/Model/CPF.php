<?php

namespace App\Model;

final class CPF
{
    private $number;

    // value object https://martinfowler.com/bliki/ValueObject.html
    public function __construct(string $number)
    {
        $this->validate($number);
        $this->number = $number;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): CPF
    {
        $this->validate($number);
        $this->number = $number;

        return $this;
    }

    private function validate(string $number): void
    {
        $validate = filter_var($number, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($validate === false) {
            echo "Cpf inválido";
            exit();
        }
    }
}
