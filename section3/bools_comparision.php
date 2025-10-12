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
    
        var_dump(true);
        var_dump(false);

        echo "---\n";
        
        $num = 35;
        var_dump($num > 10);
        var_dump($num === 35);   // 값 & 타입 비교
        var_dump($num !== 35);
        $age = 30;
        var_dump($age === '30');
        var_dump($age == '30');   // 값만 비교
        
        echo "---\n";

        echo (-10 * 0.3);


        
    ?></pre>
</body>
</html>