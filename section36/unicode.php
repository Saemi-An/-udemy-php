<?php

// header('Content-Type: text/plain');

// Cyrillic Characters(키릴 문자): 러시아를 비롯한 동유럽, 중앙아시아, 몽골 등에서 사용되는 문자 체계 (알파벳과 똑같이 생겼지만 다른 애들이 있음)
    // apple.com(오직 알파멧)과 аpplе.cоm(키릴 사용)을 url 창에 치면 다른 결과
$text1 = 'Hеllо, Wоrld!';
var_dump($text1);
var_dump('apple.com');
var_dump('аpplе.cоm');

echo "---------\n";

// non-breaking whitespace character: html 파일로 인식될 때, 줄바꿈 없이 계속 출력됨
$text2 = "Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!Hello World!";
echo "\$ 233.00";   // 가격 적을때 줄바꿈이 되지 않는 용도로 사용
var_dump($text2);

echo "---------\n";

// Invisible Whitesapce (??? 치는 방법 모르겠음)
$text3 = "Hello World";
var_dump($text3);

// Unicode full width characters

// RTL within LTR text (???)