<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
        var_dump($_GET);
    ?></pre>

    <!-- 폼 -->
    <form action="post.php" method="GET">
        <input type="text" name="color" value="<?php if ( !empty($_GET['color']) ) echo $_GET['color']; ?>">
        <input type="submit" value="확인">
    </form>

    <!-- 결과 -->
    <h1>검색 결과</h1>
    <?php if ( !empty($_GET["color"]) ): ?>
        <p>스탠리 텀블러 - 색상: <?php echo $_GET["color"] ?></p>
    <?php endif ?>

</body>
</html>