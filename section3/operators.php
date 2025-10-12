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
    
        var_dump(true && true);
        var_dump(true && false);
        var_dump(false && true);
        var_dump(false && false);
        
        echo "\n\n";

        var_dump(true || true);
        var_dump(true || false);
        var_dump(false || true);
        var_dump(false || false);
        
        echo "\n\n";

        // 배타적 논리합(Exclusive Or): 하나만 참일 때 true
        var_dump(true xor true);
        var_dump(true xor false);
        var_dump(false xor true);
        var_dump(false xor false);
        
    ?></pre>
</body>
</html>