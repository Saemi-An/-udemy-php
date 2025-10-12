<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파일 탐색</title>
    <style>
        li {
            width: 100px;
        }
        img {
            width: 100%;
        }
    </style>
</head>
<body>
    <pre><?php
    
$handle = opendir(__DIR__ . "/../images");

// 방법 1. 수동으로 다 출력하기
// var_dump($handle);
// var_dump(readdir($handle));
// var_dump(readdir($handle));
// var_dump(readdir($handle));
// var_dump(readdir($handle));
// var_dump(readdir($handle));
// var_dump(readdir($handle));
// var_dump(readdir($handle));
// closedir($handle);


# 방법 2. while문 활용
// $crntFile = readdir($handle);
// while ( $crntFile ) {
//     var_dump($crntFile);
//     $crntFile = readdir($handle);
// }

# 방법 3.
$allowedExtensions = ["jpg", "jpeg", "png"];
$images = [];
while ( ( $crntFile = readdir($handle) ) ) {
    // 유효하지 않은 파일명 건너뛰기
    if ( strlen($crntFile) <= 2 ) continue;
    
    // 확장자 확인 후 배열에 추가
    $extension = pathinfo($crntFile, PATHINFO_EXTENSION);
    if ( in_array($extension, $allowedExtensions) ) $images[] = $crntFile;
}

    ?></pre>

    <ul>
    <?php foreach( $images AS $img ): ?>
        <li>
            <img src="../images/<?php echo rawurlencode($img); ?>" alt="">
        </li>
    <?php endforeach; ?>
    </ul>

<pre><?php

// 파일이 존재하는지 확인
// 파일 = 폴더로 간주됨으로 주의
var_dump(file_exists(__DIR__ . "/../images/" . "choco-chip-scone.jpg"));

// 파일 사이즈 확인(바이트)
// 파일 사이즈(바이트) / 1024 / 1024 => MB
$filesizeInBtye = filesize(__DIR__ . "/../images/" . "choco-chip-scone.jpg") / 1024 / 1024;
echo round($filesizeInBtye, 2) . "MB";


?></pre>

</body>
</html>