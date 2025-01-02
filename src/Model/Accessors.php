<?php

declare(strict_types=1);

namespace App\Model;

trait Accessors
{
    /** @throws \ReflectionException */
    public function __call(string $name, array $arguments): mixed
    {
        $isSet = str_contains($name, 'set');
        $isGet = str_contains($name, 'get');
        $name = lcfirst(str_replace(['set', 'get'],'', $name));
        $value = $arguments[0] ?? null;

        if ($isSet && $value) {
            return $this->set($name, $value);
        }

        return ($isGet)
            ? $this->get($name)
            : null;
    }

    public function get(string $name): mixed
    {
        $property = $this->getProperty($name);
        return $this->{$property};
    }

    /** @throws \ReflectionException */
    public function set(string $name, mixed $value): static
    {
        $property = $this->getProperty($name);
        $propertyType = $this->getPropertyType($property);
        $currentType = gettype($value);

        if ($propertyType !== $currentType) {
            throw new \TypeError("Argument must be of type {$propertyType}, {$currentType} given");
        }

        $this->{$property} = $value;

        return $this;
    }

    private function getProperty(string $name): string
    {
        $hasNoProperty = property_exists($this, $name) === false;

        if($hasNoProperty) {
            throw new \BadMethodCallException('Undefined property: ' . get_class($this) . '::' . $name);
        }

        return $name;
    }

    /** @throws \ReflectionException */
    private function getPropertyType(string $property): ?string
    {
        $reflection = new \ReflectionClass($this);
        return $reflection->getProperty($property)->getType()?->getName();
    }
}
