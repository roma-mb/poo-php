<?php

declare(strict_types=1);

require_once 'src/autoload.php';

use App\Model\Account\Account;
use App\Model\Account\Holder;
use App\Model\Account\Current;
use App\Model\Account\Savings;
use App\Model\Address;
use App\Model\CPF;
use App\Model\Employee\Director;
use App\Service\Authenticate;

try {
    $cpf = new CPF('123.456.789-10');
    $address = new Address('SP', 'São Paulo', 'Al Amazonas', '4567');
    $address->setCity('RS');

    $holder = new Holder($cpf, 'User A', $address);

    $auth = new Authenticate();
    $auth->login($holder, '@holder');

    $savingsAccount = new Savings($holder);
    $currentAccount = new Current($holder);

    $currentAccount->deposit(6300);
    $currentAccount->withdraw(300);
//    $currentAccount->transfer(6300, $savingsAccount);

    echo 'HOLDER ADDRESS: ' .  $address . PHP_EOL;
    echo 'HOLDER CITY: ' .  $address->getCity() . PHP_EOL;
    echo 'ACTUAL BALANCE: ' . $currentAccount->getBalance() . PHP_EOL;

    $currentAccount->deposit(100);

    echo 'ACTUAL BALANCE: ' . $currentAccount->getBalance() . PHP_EOL;

    $currentAccount->setHolderName('User A B');

    echo 'HOLDER NAME: ' . $currentAccount->getHolderName() . PHP_EOL;
    echo 'CPF: ' . $currentAccount->getCpfHolder() . PHP_EOL;
    echo 'ACCOUNT NUMBER: ' . Account::getAccountNumber() . PHP_EOL;
} catch (\Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

echo '----------------------------------------------------------------------' . PHP_EOL;

try {
    $directorCpf = new CPF('342.548.444-00');
    $director = new Director($directorCpf, 'Director A', 3000.00);

//    $auth->login($director, '1232');
    $auth->login($director, '@director');

    $director->setSalary(3100.00);
    echo 'DIRECTOR SALARY: ' . $director->getSalary() . PHP_EOL;

    $director->setName('Director A B');
    echo 'DIRECTOR NAME: ' . $director->getEmployeeName() . PHP_EOL;

    echo 'DIRECTOR PREMIUM: ' . $director->calculationPremium() . PHP_EOL;
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

echo '----------------------------------------------------------------------' . PHP_EOL;

try {
    $cpf = new CPF('123.456.789-10');
    $address = new Address('SP', 'São Paulo', 'Al Amazonas', '11');

    //$newHolder = new Holder($cpf, 'Exc', $address);
    $newHolder = new Holder($cpf, 'User Transfer', $address);

    $auth = new Authenticate();
    $auth->login($newHolder, '@holder');

    $currentAccount = new Current($newHolder);
    $savingsAccount = new Savings($newHolder);

    $currentAccount->transfer(300.00, $savingsAccount);
    //$currentAccount->withdraw(300);
} catch (Exception $exception) {
    echo $exception->getMessage() . PHP_EOL;
}

die();
