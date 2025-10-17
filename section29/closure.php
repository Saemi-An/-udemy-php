<?php
header('Content-Type: text/plain');

$from = 'from Earth';

// 익명함수, 변수로 선언되고 있기 때문에 맨 끝에 세미콜론 필수!
$print_x3 = function() use($from) {
    /* 익명함수 영역은 새로은 variable context를 사용하기 때문에 전역 변수를 그냥 가져다 사용할 수 없음! 
    global $from;
    */
    var_dump('Hello, World ' . $from . '!');
    var_dump('Hello, World ' . $from . '!');
    var_dump('Hello, World ' . $from . '!');
};

// 익명함수 호출
$print_x3();

// var_dump($print_x3);