<?php

header('Content-Type: text/plain');

$emoji = "😊";
$emoji2 = "🫑";
$emojis = "👀✍🏽🗑️";
$hangul = "안녕하세요";

var_dump(strlen($emoji));
var_dump(strlen($emoji2));
var_dump(strlen($emojis));
var_dump(strlen($hangul));


// Ascii Character 들은 모두 1 byte
echo "---\n";
var_dump(strlen('()'));
var_dump(strlen('php'));
var_dump(strlen('<h>'));
var_dump(strlen(''));


// strlen() 함수는 실제 문자수를 세는 것이 아니라 문자열이 차지하는 메모리 크기를 세는 함수임


// mb_strlen(): multi-byte, 문자 하나가 최대 4byte까지 차지할 수 있음 - strlen()과는 다르게 실제 문자들을 조회함
echo "---\n";
var_dump(mb_strlen($hangul));
// 이모티콘은 좀 다름: 
var_dump(mb_strlen($emoji));
var_dump(mb_strlen($emoji2));
echo"{$emojis}: "; var_dump(mb_strlen($emojis));
echo"👀: "; var_dump(mb_strlen('👀'));
echo"✍🏽: "; var_dump(mb_strlen('✍🏽'));
echo"🗑️: "; var_dump(mb_strlen('🗑️'));

echo "---\n";
$face = '👵🏿';
var_dump($face);
var_dump(mb_substr($face, 0, 1));
var_dump(mb_substr($face, 1, 1));