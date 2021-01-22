<?php

namespace App\Model\Account;

use App\Exceptions\InsufficientFundsException;
use InvalidArgumentException;

abstract class Account
{
    private $holder;
    private $balance;
    private static $accountNumber = 0;

    public function __construct(Holder $holder)
    {
        $this->holder  = $holder;
        $this->balance = 0;

        self::$accountNumber++;
    }

    public function __destruct()
    {
        self::$accountNumber--;
    }

    public function withdraw(float $value): void
    {
        $value += ($this->percentageTariff() * $value);

        if ($value > $this->balance) {
            throw new InsufficientFundsException($value, $this->balance);
        }

        $this->balance -= $value;
    }

    public function deposit(float $value): void
    {
        if ($value < 0) {
            throw new InvalidArgumentException('Valor precisa ser positivo');
        }

        $this->balance += $value;
    }

    public function getHolderName(): string
    {
        return $this->holder->getName();
    }

    public function setHolderName(string $holder): Account
    {
        $this->holder->setName($holder);

        return $this;
    }

    public function getCpfHolder(): string
    {
        return $this->holder->getCpf();
    }
    
    public function getBalance(): float
    {
        return $this->balance;
    }

    public static function getAccountNumber(): int
    {
        return self::$accountNumber;
    }

    abstract public function percentageTariff(): float;
}
