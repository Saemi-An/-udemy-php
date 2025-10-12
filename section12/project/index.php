<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>파일 탐색</title>
    <style>
        /* 리셋 */
        ul{margin: 0;padding: 0;list-style: none;}
        p{margin: 0;}

        /* 스타일 */
        ul {
            display: grid;
            grid-template-columns: 1fr 1fr;
            justify-items: center;
            gap: 16px;
        }
        li {
            width: 300px;
            padding: 8px;
            border: 5px double black;
            border-radius: 16px;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .img_container {
            width: 100%;
        }
        img {
            display: block;
            width: 100%;
            border-radius: 12px;
        }

        .txt_container{
            margin-left: 18px;
            margin-right: 12px;
            word-break: keep-all;
            
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 12px;
        }
        .title {
            font-weight: 600;
            border-bottom: 2px solid black;
        }
        .price {text-align: right;}
        .cmt {font-size: 10px; text-align: right;}
    </style>
</head>
<body>
    <pre><?php
    [
        "imgName" => ["name", "price", "cmt"]
    ];
    
    $handle = opendir(__DIR__ . "/../images");

    $allowedExtensions = ["jpg", "jpeg", "png"];
    $images = [];
    while ( ( $crntFile = readdir($handle) ) ) {
        // 유효하지 않은 파일명 건너뛰기
        if ( strlen($crntFile) <= 2 ) continue;
        
        // 확장자 확인 후 배열에 추가
        $extension = pathinfo($crntFile, PATHINFO_EXTENSION);
        $imgName = pathinfo($crntFile, PATHINFO_FILENAME);

        $imgInfo = explode("\n", file_get_contents(__DIR__ . "/../images/" . $imgName . ".txt"));
        // if ( in_array($extension, $allowedExtensions) ) $images[] = [$crntFile => [$imgInfo[0], $imgInfo[1], $imgInfo[2]]];
        if ( in_array($extension, $allowedExtensions) ) {
            $images[$crntFile] = [$imgInfo[0], $imgInfo[1], $imgInfo[2]];
        }
    }

    var_dump($images);
    
    ?></pre>

    <ul>
    <?php foreach( $images AS $fileName => $fileInfo ): ?>
        <li>
            <div class="img_container">
                <img src="../images/<?php echo rawurlencode($fileName); ?>" alt="">
            </div>
            <div class="txt_container">
                <p class="title"><?php echo $fileInfo[0]; ?></p>
                <p class="price"><?php echo $fileInfo[1]; ?></p>
                <p class="cmt"><?php echo $fileInfo[2]; ?></p>
            </div>
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