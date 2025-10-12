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
    
    $handle = opendir(__DIR__ . "/../images");

    $images = [];
    $allowedExtensions = ["jpg", "jpeg", "png"];
    while ( ( $crntFile = readdir($handle) ) ) { 
        // 유효하지 않은 파일명 건너뛰기
        if ( strlen($crntFile) <= 2 ) continue;
        
        // 유효한 확장자인지 확인
        $extension = pathinfo($crntFile, PATHINFO_EXTENSION);
        if ( in_array($extension, $allowedExtensions) ) {

            // 파일명
            $txtFileName = pathinfo($crntFile, PATHINFO_FILENAME) . ".txt";
            if ( file_exists(__DIR__ . "/../images/" . $txtFileName) ) {
                $txts = explode("\n", file_get_contents(__DIR__ . "/../images/" . $txtFileName));
            }
            $images[] = [
                "img" => $crntFile,
                "name" => $txts[0],
                "price" => $txts[1],
                "cmt" => $txts[2],
            ];
        }
    }
    closedir($handle);
    
    ?></pre>

    <ul>
    <?php foreach( $images AS $elem ): ?>
        <li>
            <div class="img_container">
                <img src="../images/<?php echo rawurlencode($elem["img"]); ?>" alt="">
            </div>
            <div class="txt_container">
                <p class="title"><?php echo $elem["name"]; ?></p>
                <p class="price"><?php echo $elem["price"]; ?></p>
                <p class="cmt"><?php echo $elem["cmt"]; ?></p>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>

</body>
</html>