<?php

namespace App\Model;

trait Accessors
{
    public function __get(string $name)
    {
        return $this->{'get' . ucfirst($name)}();
    }
}