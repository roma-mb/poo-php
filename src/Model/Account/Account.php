<?php

namespace App\Model\Account;

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
            echo "Saldo indisponível";
            return;
        }

        $this->balance -= $value;
    }

    public function deposit(float $value): void
    {
        if ($value < 0) {
            echo "Valor precisa ser positivo";
            return;
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

    abstract function percentageTariff(): float;
}
