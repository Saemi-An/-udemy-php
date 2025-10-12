<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    // file_get_contents(): 전체 파일 내용을 문자열로 반환하여 메모리에 로드 -> 변수에 담은 후 가공 가능
    // API 응답 읽기, 문자열 처리에 사용
    $text = file_get_contents(__DIR__ . "/inc/demo.txt");
    
    echo $text;

    echo "\n\n다음 내용\n\n";

    // readfile(): 파일 내용을 메모리에 로드시키지 않고 그대로 출력하며 출력된 바이트 수와 함께 반환함
    // 대용량 파일 처리, 이미지나 대용량 텍스트 직접 출력시 사용
    $text2 = readfile(__DIR__ . "/inc/demo.txt");
    echo $text2;


    ?></pre>

</body>
</html>