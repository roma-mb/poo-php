<?php

declare(strict_types=1);

namespace App\Model;

final class Address
{
    use Accessors;

    public function __construct(
        private string $city,
        private string $neighborhood,
        private string $street,
        private string $number
    ){}

    public function __toString(): string
    {
        return "{$this->street} {$this->number} {$this->neighborhood} {$this->city}";
    }
}
