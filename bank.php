<?php

require_once 'src/autoload.php';

use App\Model\Account\Account;
use App\Model\Account\Holder;
use App\Model\Account\Current;
use App\Model\Account\Savings;
use App\Model\Address;
use App\Model\CPF;
use App\Model\Employee\Director;
use App\Service\Authenticate;

$cpf     = new CPF('123.456.789-10');
$address = new Address('SP', 'São Paulo', 'Al Amazonas', '4567'); 
$holder  = new Holder($cpf, 'User A', $address);

// interface
$auth = new Authenticate();
$auth->login($holder, '@holder');

$savingsAccount = new Savings($holder);
$currentAccount = new Current($holder);
$currentAccount->deposit(1000);
$currentAccount->withdraw(300);

// __toString();
echo 'HOLDER ADDRESS: ' .  $address . PHP_EOL;
echo 'HOLDER CITY: ' .  $address->city . PHP_EOL;

//result 685
echo 'ACTUAL BALANCE: ' . $currentAccount->getBalance() . PHP_EOL;

$currentAccount->deposit(100);

//result 785
echo 'ACTUAL BALANCE: ' . $currentAccount->getBalance() . PHP_EOL;

$currentAccount->setHolderName('User A B');
echo 'HOLDER NAME: ' . $currentAccount->getHolderName() . PHP_EOL;

//result 123.456.789-10
echo 'CPF: ' . $currentAccount->getCpfHolder() . PHP_EOL;

//result 2 current and savings
echo 'ACCOUNT NUMBER: ' . Account::getAccountNumber() . PHP_EOL;

echo '----------------------------------------------------------------------'. PHP_EOL;

$directorCpf = new CPF('342.548.444-00');
$director = new Director($directorCpf, 'Director A', 3000.00);

// invalid password
$auth->login($director, '1232');
// valid
$auth->login($director, '@director');

$director->setSalary(3100.00);
echo 'DIRECTOR SALARY: ' . $director->getSalary() . PHP_EOL;

$director->setName('Director A B');
echo 'DIRECTOR NAME: ' . $director->getEmployeeName() . PHP_EOL;

// 6200.00
echo 'DIRECTOR PREMIUM: ' . $director->calculationPremium() . PHP_EOL;
die();
