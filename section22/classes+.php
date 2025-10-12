<?php
header('Content-Type: text/plain');

class BankAccount {
    private float $balance = 0;

    // 생성자
    public function __construct(
        private string $nr,
        private string $holder,
        float $balance) {

        // 오브젝트 생성시 사용자가 무슨 값을 넣어도 잔액이 마이너스가 되지 않도록 보장
        $this->balance = max(0, $balance);

        echo "새로운 계좌가 개설되었습니다: 계좌번호 [{$this->nr}], 예금주 [{$this->holder}]님, 잔액 [{$this->balance}]원\n";
    }

    // 함수
    private function updateDB():bool {
        // DB 변경
        return true;
    }

    public function printBalance() {
        echo "{$this->holder}님의 계좌번호는 {$this->nr}입니다. 현재 잔액: " .  number_format($this->balance, 2) . "원\n";
    }

    function getBalance():float {
        $this->setBalance(1000000000);
        var_dump($this->balance);

        return $this->balance;
    }

    public function setBalance(int|float $money) {
        $this->balance = $money;
    }

    public function transfer(BankAccount $to, int|float $amount = 0) {

        // 송금이 잔액이 충분한지 확인
        if ( $this->balance >= $amount ) {

            $this->balance -= $amount;
            $to->balance += $amount;

            if ( $this->updateDB() ) {
                echo "송금이 성공적으로 완료 되었습니다!\n";
            } else {
                echo "DB 업데이트가 잘못 되었습니다 :(";
            }

        }
        else {
            echo '잔액이 부족합니다: ' . number_format($this->balance - $amount) . "원\n";
        }
    }
}

$acc_1 = new BankAccount('0001', '안새미', 1500);
$acc_2 = new BankAccount('0002', '초원', 800);

// 잔액 설정 (public)
var_dump($acc_1->balance);
$acc_1->printBalance();
$acc_1->setBalance(3000);
var_dump($acc_1->getBalance());

// 송금 함수 호출
// $acc_1->transfer($acc_2, 300);
// $acc_1->printBalance();
// $acc_2->printBalance();