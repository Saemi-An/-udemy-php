<?php
header('Content-Type: text/plain');

$msg = 'Kako messages are sent out for 30 customers 80th!';

// '/' regular expression의 시작과 끝
// '\d' 십진수 숫자 - 0, 1, 2, 3, 4, 5, 6, 7, 8, 9

// $result = null;
// var_dump(preg_match('/\d\d/', $msg, $result));
// var_dump($result);

// $result = null;
// var_dump(preg_match_all('/\d\d/', $msg, $result));
// var_dump($result);

// '\D' 십진수 숫자가 아닌 모든 문자
// $result = null;
// var_dump(preg_match_all('/\D/', $msg, $result));
// var_dump($result);

// '\w' - [a-zA-Z0-9_]에 해당하는 문자 하나
// $result = null;
// var_dump(preg_match('/\d\d\w\w/', $msg, $result));
// var_dump($result);

$result = null;
var_dump(preg_match('/\d\dth/', $msg, $result));
var_dump($result);