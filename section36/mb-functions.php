<?php

// header('Content-Type: text/plain');

$hangul = '안녕하세요';

var_dump(mb_strlen($hangul));

var_dump(mb_substr($hangul, 0, 2));

var_dump(strtoupper('äöü'));
var_dump(mb_strtoupper('äöü'));

var_dump(strpos($hangul, '하'));   // 바이트 기준
var_dump(mb_strpos($hangul, '하'));   // 실제 문자 기준 인덱스

var_dump(mb_str_split('🐦‍⬛'));
var_dump(mb_str_split('안녕하세요'));

var_dump(mb_ord('안'));   // unicode 숫자로 표현해줌
var_dump(mb_chr(50504));
echo '&#50504';   // html 파일로 헤더가 읽으면 '페이지 소스 보기'와 브라우저에서 렌더링된 문자가 다름