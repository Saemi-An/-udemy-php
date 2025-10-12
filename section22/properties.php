<?php
declare(strict_types=1);
header('Content-Type: text/plain');

class BankAccount {
    public string $nr;
    public string $holder;
    public float $balance = 0;
}

$acc_1 = new BankAccount();
// $acc_1->nr = 1234;
// var_dump($acc_1);

$acc_1->nr = (string) 5678;
var_dump($acc_1);