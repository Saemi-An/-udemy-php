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
    
        $meaning = 100;
        echo ($meaning * 3) . "\n";   // 연산 후 문자열로 표현 후 줄바꿈
        echo '줄바꿈 됐냐?';
        echo "\n\n";
        
        echo '5' + '11';
        // echo '5' + 'a11';   // Fatal error
        echo '5' + '11a';   // Warning
        echo "\n\n";
        
        echo round(3.33, 1);
        echo "\n\n";

        $meaning *= 2;
        echo $meaning;
        
    ?></pre>
</body>
</html>