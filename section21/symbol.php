<?php
header('Content-Type: text/plain');

// ^ - 문자열 시작
// $ - 문자열 끝

$mes = 'Happy 30th Birthday!';

// 문자열이 숫자로 시작하는가?
// var_dump(preg_match('/^\d/', $msg));

// '.' - 모든 문자 --> 실제 문자 '.'을 의미하려면 백틱을 사용해서 escape 필요
// 1개 이상의 숫자 . 1개 이상의 숫자가 있는가?
// $result = null;
// var_dump(preg_match('/\d+\.\d+/', 'hello 123.45 test', $result));
// var_dump($result);

// 문자가 (1개 이상의 숫자)로 시작하여 (.)을 포함하고 (1개 이상의 숫자)로 끝나는가?
// 문자열이 .을 포함한 숫자만으로 이루어져 있는지를 확인
// $result = null;
// var_dump(preg_match('/^\d+\.\d+&/', 'hello 123.45 test', $result));
// var_dump($result);


// 이메일 주소인지 검증: 문자의 시작이 | 아무 문자 | @ | 아무 문자 | . | 아무 문자 | 문자의 끝
// 하지만 이 정규식이 valid한 이메일 주소인지를 완전무결하게 확인해 줄수는 없음!
$result = null;
var_dump(preg_match('/^.+@.+\..+$/', 'cchocolatec@naver.com', $result));
var_dump($result);