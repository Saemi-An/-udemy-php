<?php
header('Content-Type: text/plain');

// union types 사용시에는 null을 정확히 적어줘야함
function f(int|float|null $num) {
    return $num + 5;
}

// 반환값 타입 지정
function ff(int|float|null $num): ?string {
    // return 'hello';
    return null;   // 리턴값에 물음표 사용해서 null 타입 허용 후 null 리턴시, 꼭 null을 리턴한다고 명시해 줘야함
    // return;
}

// (타입 하나만 사용시) null, string 허용됨
function printx3(?string $str) {
    if ( !empty($str) ) {
        echo "{$str}\n";
        echo "{$str}\n";
        echo "{$str}\n";
    } else {
        echo "Didn't pass.";
    }
};

printx3(null);