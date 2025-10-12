
<!--
Parse error: 파싱이 안되면 전체 코드가 렌더링되지 않음. 
    에러 메세지의 위치는 100% 정확하지 않음.
    변수 앞에 달러($) 필수
    세미콜론(;) 필수

Warning
    워닝 부분 제외하고 렌더링은 됨

Fatal error
    PHP 실행 중지됨
    Parse error는 파일을 읽을 없어서 렌더링이 안되는 것.
    하지만 Fatal error는 파일은 읽었지만 PHP 실행시 문제가 발생하여 실행이 안됨.

-->


<?php

echo '...';
$pageTitle = 'This is a pageTitle variable';
echo $title;

echo '...';
include 'doesnotexist.php';

someFunc();
