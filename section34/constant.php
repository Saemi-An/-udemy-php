<?php

header('Content-Type: text/plain');

/*
// 상수 설정 - 설정 파일 등에서 사용됨
define('FILE_PATH', __DIR__ . '/constant.php');
var_dump(FILE_PATH);
*/


class Car {

    // 최초 선언 이후 변경 불가능
    const FILE_PATH = __DIR__ . '/constant.php';

}

var_dump(CAR::FILE_PATH);
var_dump(PDO::FETCH_ASSOC);
