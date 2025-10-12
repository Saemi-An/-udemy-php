<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
        $txt = "안녕하세요.\n제 이름은 안새미 입니다.\n저는 29살이며 현재 개발자로 일하고 있습니다.\n한달차 신입 개발자로서 PHP를 공부하는 중 입니다.";

        var_dump($txt);

        echo "\n\n";
        
        // str => array
        var_dump(explode("\n", $txt));
        
        echo "\n\n";
        var_dump(explode("안", $txt));

        $splitted = explode("\n", $txt);
    ?></pre>

    <p><?php echo $txt; ?></p>

    <?php foreach ($splitted AS $a): ?>
        <p><?php echo $a; ?></p>
    <?php endforeach; ?>
    
    <div style="border: 1px solid black; margin: 10px 0;"></div>


    <?php
        $merged = implode("^-^", $splitted);
        var_dump($merged);
    ?>

    <!-- 복잡하지만 야무진 방법 -->
    <ul><li>
        <?php
        
        echo implode("</li><li>", explode("\n", $txt));
        
        ?>
    </li></ul>
</body>
</html>