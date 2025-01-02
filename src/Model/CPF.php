<?php

declare(strict_types=1);

namespace App\Model;

use InvalidArgumentException;

final class CPF
{
    use Accessors;

    public function __construct(private string $number)
    {
        $this->validate($number);
    }

    private function validate(string $number): void
    {
        $validate = filter_var($number, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if ($validate === false) {
            throw new InvalidArgumentException('Invalid Cpf.');
        }
    }
}
