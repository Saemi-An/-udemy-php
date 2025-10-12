<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php

    // warning error 발생시킴
    // include __DIR__ . "/inc/functions.php";

    // fatal error 발생시킴 --> 디버깅시 용이함
    // require __DIR__ . "/inc/functions.php";
    



    // 똑같은 파일을 require로 로드 시키면 함수 이름 중복되서 에러남
    // require __DIR__ . "/inc/functions.inc.php";
    // require __DIR__ . "/inc/functions.inc.php";
    
    // 한번만 로드 하도록
    require_once __DIR__ . "/inc/all.inc.php";
    require_once __DIR__ . "/inc/functions.inc.php";
    require_once __DIR__ . "/inc/functions.inc.php";
    include_once __DIR__ . "/inc/functions.inc.php";

    $txt = "I'm hungry";
    
    ?></pre>

    <h1><?php echo e($txt); ?></h1>
</body>
</html>