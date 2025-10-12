<?php
header('Content-Type: text/plain');

// 정규 표현식을 만들어보기: [abc] - 개별 a, b, c 문자
// [ABC]
// [a-c] - Unicode 베이스
// [A-Za-z0-9]
// [!?_]
//[a-z\d] : a 부터 z 까지의 아무 문자 하나와 십진수 숫자 하나

// $msg = 'a0d bb+1 c2';
// $result = null;
// var_dump(preg_match_all('/[a-z]\d/', $msg, $result));
// var_dump($result);

// $msg = 'Happy 30th Birthday!';
// $match = null;
// var_dump(preg_match_all('/[0-9]{2} ?[a-z]*/', $msg, $match));
// var_dump($match);

// $msg = 'Happy 30th Birthday!';
// $match = null;
// var_dump(preg_match_all('/[bB][a-zA-Z]+/', $msg, $match));
// var_dump($match);

$msg = 'Happy 30th Birthday!';
$match = null;
var_dump(preg_match('/[^ a-zA-Z][0-9]/', $msg, $match));
var_dump($match);