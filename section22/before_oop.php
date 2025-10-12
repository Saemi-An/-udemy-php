<?php
header('Content-Type: text/plain');

$account_1 = [
    'accNum' => '0001',
    'holder' => 'saemi',
    'balance' => '1200',
];

$account_2 = [
    'accNum' => '0002',
    'holder' => 'chowon',
    'balance' => '800',
];

function print_balance(array $account) {
    echo $account['holder'] . '님의 계좌번호는 [' . $account['accNum'] . ']입니다.' . ' 현재 잔액은 다음과 같습니다: ' . number_format($account['balance']) . '원' . "\n";
}

print_balance($account_1);
print_balance($account_2);

// 함수에 사용되는 변수들의 타입을 지정할 수 없음

function transfer(array &$from, array &$to, float|int $amount) {

    // 송금 금액과 송금인 잔고 비교
    if ( $from['balance'] >= $amount ) {
        // 수취인 잔액 add
        $to['balance'] += $amount;
    
        // 송금인 잔액 deduct
        $from['balance'] -= $amount;

        // 업데이트 내역 보여줌
        print_balance($from);
        print_balance($to);
    }
    else {
        echo $from['holder'] . '님의 계좌 잔액이 부족합니다.';
    }
    
}

// 함수를 호출시 변수의 복사본이 전달됨(pass by value) --> 함수 안에서 변수를 업데이트해도 원본 변수는 그대로 남아있음
// 함수 정의시 인자 앞에 &를 붙이면 pass by reference가 적용되어 "원본 변수의 참조가 전달됨" --> 함수 내 변수 업데이트 내용이 원본 변수에도 적용됨
transfer($account_1, $account_2, 100);