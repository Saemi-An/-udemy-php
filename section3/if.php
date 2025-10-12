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
        include 'if_var.php';   // 다른 파일에서 변수 가져옴
        // $status = '정상';

        if ( $status === '수리중' ) {
            echo "처리중..\n";
            echo '조건은 참이다.';
        } else {
            echo '조건은 거짓이다';
        }

        echo "\n";
        
        if ($status) echo '변수 status 확인됨';
        else echo '변수 status 없음';
        
        echo "\n\n";
        
        if (true)
        
        
        
        echo "PHP는 linebreak를 상관하지 않음. if문 시작하고 안 끝내면 줄바꿈이 있더라도 해당 줄이 출력됨.\n따라서 한줄로 쓰거나 {} 사용할것.";
        
    ?></pre>
</body>
</html>