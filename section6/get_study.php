<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- 변수 준비 -->
    <?php    
    $params = [
        "name" => "Saemi",
        "age" => 29,
        "taste" => "Deserts",
    ];
    
    $query = http_build_query($params);

    $url = "http://localhost/php/section6/get_study.php?" . $query;
    ?>

    <!-- 이동하기 버튼 -->
    <a href="<?php echo $url; ?>">이동하기</a>

    <!-- 쿼리스트링 유효할시 메세지 -->
    <?php if ( !empty($_GET["name"]) && !empty($_GET["age"]) && !empty($_GET["taste"])): ?>
        <h1>Welcome back, <?php echo $_GET["name"]; ?></h1>
        <p>Here are various choices of your <?php echo $_GET["taste"]; ?></p>
    <?php endif; ?>
    
</body>
</html>