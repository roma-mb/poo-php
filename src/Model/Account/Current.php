<?php

declare(strict_types=1);

namespace App\Model\Account;

use App\Exceptions\InsufficientFundsException;
use App\langs\Lang;

class Current extends Account
{
    public function percentageTariff(): float
    {
        return 0.05;
    }

    public function transfer(float $value, Account $account): void
    {
        $balance = $this->getBalance();

        if ($value > $balance) {
            $message = Lang::get(message: 'messages.insufficient_balance', replace: [
                ':value' => (string) $value,
                ':balance' => (string) $balance
            ]);

            throw new InsufficientFundsException($message);
        }

        $this->withdraw($value);
        $account->deposit($value);
    }
}
