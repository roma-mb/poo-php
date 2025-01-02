<?php

declare(strict_types=1);

namespace App\Model\Account;

class Savings extends Account
{
    public function percentageTariff(): float
    {
        return 0.03;
    }
}
