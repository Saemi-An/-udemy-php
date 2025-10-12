<?php

// 1. 파일 읽어오기
$contents = file_get_contents(__DIR__ . "/../data/index.json");

// 2. json 디코딩
$data = json_decode($contents, true);

// PHP 패키지 확인
// phpinfo();

// 3. bzip2 형식 파일 압축 풀기
// echo file_get_contents("compress.bzip2://" . __DIR__ . "/../data/korea.singapore.json.bz2");

// 4. 최종 결합: json 디코딩 + bzip2 압축 풀기
// $detailed_data = json_decode(file_get_contents("compress.bzip2://" . __DIR__ . "/../data/korea.singapore.json.bz2"), true);
$detailed_data = json_decode(file_get_contents(__DIR__ . "/../data/openaq_misa.csv"), true);
?>

<!-- 5. 데이터 확인 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
    var_dump($detailed_data);
    
    ?></pre>
</body>
</html>