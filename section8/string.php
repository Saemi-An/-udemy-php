<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
    $txt = "Let's have a look at string functions. There are various functions where you can manipulate string type of data.";

    var_dump($txt[0]);
    
    // substr(원본str, 시작인덱스, 시작인덱스로부터 얼마나);
    echo "\n\nsubstr(): param 3에 주목\n";
    var_dump(substr($txt, 6, 10));
    var_dump(substr($txt, 6, 4));
    var_dump(substr($txt, 39));
    // 한글 사용시 mb_substr() 사용
    $korean = "점메추";
    var_dump(mb_substr($korean, 0));
    
    // strlen(원본str);
    echo "\n\nstrlen(): (실제 문자 수를 계산하는 것이 아니라 바이트를 계산하는 것임으로, 일반 문자 이외의 문자 사용시 주의 필요)\n";
    $txt_without_emoji = "Hey there";
    $txt_with_emoji = "Hey there🐶";
    var_dump(strlen($txt_without_emoji));
    var_dump(strlen($txt_with_emoji));
    
    // nstr_starts_with(원본str), str_ends_with(원본str);
    echo "\n\nstr_starts_with(), str_ends_with(): (대소문자 구분함)\n";
    $txt3 = "Apple Pineapple";
    var_dump(str_starts_with($txt3, "Apple"));
    var_dump(str_ends_with($txt3, "pineapple"));
    
    // strtolower(원본str), strtoupper(원본str), ucfirst(원본str);
    echo "\n\strtolower(): \n";
    var_dump(strtolower($txt3));
    var_dump(strtoupper($txt3));
    // 오직 첫 문자만 딱 한번 대문자로 변환
    $txt4 = "hello world!";
    var_dump(ucfirst($txt4));
    
    // trim(원본str);
    echo "\n\ntrim(): \n";
    $txt5 = " 15,000 ";
    echo "원본 텍스트: " . $txt5 . ", 문자 길이: " . strlen($txt5) . "\n";
    echo "trim 적용 후: " . trim($txt5) . ", 문자 길이: " . strlen(trim($txt5));
    
    echo "\ntrim(\$원본텍스트, '제거할 문자'): \n";
    $txt6 = "gHello World!";
    var_dump(trim($txt6, "g"));
    var_dump(rtrim($txt6, "g"));
    
    // strpos(원본str, "찾을 문자");
    echo "\n\nstrpos(원본str, 찾을 문자): '찾을 문자'가 어디에 위치해 있는지 해당 문자으 시작 인덱스를 리턴\n";
    $txt7 = "What should I have for lunch tommorrow?";
    var_dump(strpos($txt7, "lunch"));
    var_dump(strpos($txt7, "js"));
    ?></pre>
</body>
</html>