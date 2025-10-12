<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
    // 2. __DIR__ 을 사용해 root를 명확히 잡이줌
    // var_dump(__DIR__);

    // 1. include.php -> ./inc/a.php -> (main 기준, 즉 root 기준에서 해당 파일이 있는지 탐색함)b.php

    include __DIR__ . '/inc/a.php';

    echo "\n\n테스트\n\n";

    var_dump(__DIR__);
    var_dump(__FILE__);
    var_dump(dirname(__FILE__));
    
    ?></pre>
</body>
</html>