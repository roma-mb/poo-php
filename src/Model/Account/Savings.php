<?php

namespace App\Model\Account;

class Savings extends Account
{
    public function percentageTariff(): float
    {
        return 0.03;
    }
}
