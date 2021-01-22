<?php

namespace App\Model\Account;

use App\Exceptions\InsufficientFundsException;

class Current extends Account
{
    public function percentageTariff(): float
    {
        return 0.05;
    }

    public function transfer(float $value, Account $account): void
    {
        if ($value > $this->getBalance()) {
            throw new InsufficientFundsException($value, $this->getBalance());
        }

        $this->withdraw($value);
        $account->deposit($value);
    }
}
