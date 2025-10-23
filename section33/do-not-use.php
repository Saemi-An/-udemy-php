<?php

header('Content-Type: text/plain');

// 비밀번호 다룰때 하면 안되는 것들

// 비밀번호를 plain text로 담기
// $pwd = 'saemi123';

// 해시함수 사용 
    // 인터넷에 해시값 검색하면 다 나옴
    // 매번 해시값이 똑같음
// $pwd = md5('saemi123');
$pwd = sha1('saemi123');
var_dump($pwd);