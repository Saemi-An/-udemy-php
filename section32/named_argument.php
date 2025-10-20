<?php

header('Content-Type: text/plain');

// PHP 8.0 이상

// args 기본값 설정
function print_3x($str = 'Hello, World!', $repeat = 3) {
    
    for ( $i = 0; $i < $repeat; $i++ ) {
        echo "{$str}\n";
    }

}

// args 기본값 override
// print_3x('Hello, Saemi', 2);

// args 중 두번째 기본값만 override
// print_3x('Hello, World!', 2);

// named_argument를 사용
print_3x(repeat: 2);

$cnt = 5;
print_3x(repeat: $cnt);

// named_parameter를 사용하여 args의 순서 바꾸기
print_3x(repeat: 1, str:'Hi, Chowon:)');

