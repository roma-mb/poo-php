<?php

namespace App\Model\Account;

class Current extends Account
{
    public function percentageTariff(): float
    {
        return 0.05;
    }

    public function transfer(float $value, Account $account): void
    {
        if ($value > $this->balance) {
            echo "Saldo indisponível";
            return;
        }

        $this->withdraw($value);
        $account->deposit($value);
    }
}
