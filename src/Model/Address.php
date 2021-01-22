<?php

namespace App\Model;

final class Address
{
    use Accessors;

    private $city;
    private $neighborhood;
    private $street;
    private $number;

    public function __construct($city, $neighborhood, $street, $number)
    {
        $this->city         = $city;
        $this->street       = $street;
        $this->number       = $number;
        $this->neighborhood = $neighborhood;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity($city): Address
    {
        $this->city = $city;

        return $this;
    }

    public function getNeighborhood(): string
    {
        return $this->neighborhood;
    }

    public function setNeighborhood($neighborhood): Address
    {
        $this->neighborhood = $neighborhood;

        return $this;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet($street): Address
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber($number): Address
    {
        $this->number = $number;

        return $this;
    }

    public function __toString(): string
    {
        return "{$this->street} {$this->number} {$this->neighborhood} {$this->city}";
    }
}
