<?php

declare(strict_types=1);

namespace App\Model\Account;

use App\Exceptions\InsufficientFundsException;
use App\langs\Lang;
use InvalidArgumentException;

abstract class Account
{
    private static int $accountNumber = 0;
    private float $balance;

    public function __construct(
        private Holder $holder,
    )
    {
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
            $message = Lang::get(message: 'messages.insufficient_balance', replace: [
                ':value' => (string) $value,
                ':balance' => (string) $this->balance
            ]);
            throw new InsufficientFundsException($message);
        }

        $this->balance -= $value;
    }

    public function deposit(float $value): float
    {
        if ($value < 0) {
            $message = Lang::get('messages.should_gt_zero');
            throw new InvalidArgumentException($message);
        }

        $this->balance += $value;

        return $this->balance;
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
