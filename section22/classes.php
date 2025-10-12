<?php
header('Content-Type: text/plain');

class BankAccount {
    // 속성 (타입 지정)
    public string $nr;
    public string $holder;
    public float $balance = 0;
    
    // 생성자
    function __construct(string $nr, string $holder, float $balance) {
        $this->nr = $nr;
        $this->holder = $holder;
        $this->balance = $balance;

        echo "새로운 계좌가 개설되었습니다: 계좌번호 [{$this->nr}], 예금주 [{$this->holder}]님, 잔액 [{$this->balance}]원\n";
    }

    // 함수
    function printBalance() {
        echo "{$this->holder}님의 계좌번호는 {$this->nr}입니다. 현재 잔액: " .  number_format($this->balance, 2) . "원\n";
    }
}

$acc_1 = new BankAccount('0001', '안새미', 1500);
$acc_1->printBalance();
