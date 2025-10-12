<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>p{margin: 0;}</style>
</head>
<body>
    <pre><?php
    // nl2br($원본str)
    $txt = "Hi there!\nI'm from South Korea.";
    
    // str_replace("찾는 문자", "변환할 문자", $원본str)
    $txt2 = "I'm not hungry anymore.\nBut still cannot go to sleep.";
    $txt3 = "My cat is chilly.\nMy cat takes a nap all the time.\nMy cat is so cute.";
    
    ?></pre>

    <p><?php echo $txt; ?></p>
    <p><?php echo nl2br($txt); ?></p>
    <br>
    <p><?php echo $txt2; ?></p>
    <p><?php echo str_replace("\n", "<br>", $txt2); ?></p>
    <br>

    <!-- str_replace로 줄바꿈하는 두 가지 방법 - 개발자 도구에서 확인할것! -->
    <p><?php echo $txt3; ?></p>
    <!-- 방법 1: br 사용 -->
    <p><?php echo str_replace(["\n", "My cat"], ["<br>", "Chowon"], $txt3); ?></p>
    <!-- 방법 2: p태그 사용 -->
    <p>
        <?php echo str_replace("\n", "</p><p>", $txt3) ?>
    </p>
</body>
</html>