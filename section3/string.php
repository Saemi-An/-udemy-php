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
    
        $doing = '\'문자열\'에 관해 배우는 중';
        echo $doing . ' ...' . ' 이건 사실 문자열 더하기 한거임';
        echo '<br><br>';
        echo '줄바꿈 됐냐?';
        echo '<br><br>';
        
        $eating = "퀴즈노스";
        echo "$eating 먹고싶다.<br><br>";
        
        $complain = "더워";
        echo "지금 너무 {$complain}_!";
        echo '<br><br>';

        $plan_1 = '음쓰 처리';
        $plan_2 = '머리 감기';
        $plan_3 = '애들 간식/화장실 챙기기';
        echo "오늘 할 일: {$plan_1} + {$plan_2} + {$plan_3} + PHP 컨벤션 찾아보기\n";
        echo "\thi";
        
    ?></pre>

    <?php echo "오늘 할일\n이 너무 많아도 꾸준히 해보자"; ?>
</body>
</html>