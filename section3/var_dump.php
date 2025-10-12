<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .body {
            border: 1px solid black;
            border-radius: 12px;
            padding: 16px;
        }
    </style>
</head>
<body class="body">
    <pre><?php
    
        var_dump('Hello, World!');
        var_dump('🐦‍⬛');
        var_dump('안');
        var_dump('ㅇ');
        
        var_dump(123);
        var_dump(3.14);
        
        var_dump(4 + '1');

        $pocketmon = 'Chikorita';
        var_dump($pocketmon);
        
        // 1센트 = 1포인트
        // 100센트 = 1달러
        $price = 139.2;   // 달러
        $points = $price * 100;
        $test = intval($price * 100);
        echo "원래 가격: {$price}원, 포인트: {$points} | intval($test): ";


    ?></pre>
</body>
</html>