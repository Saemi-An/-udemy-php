<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
    if (isset($_GET["price"])) {
        // ~?price=1000php
        $price = (int) $_GET["price"];
        var_dump($price);
        var_dump(is_integer($price));
        var_dump($price * 0.7);
    }

    var_dump($_GET);

    if (isset($_GET["name"])) {
        $name = (string) $_GET["name"];
        var_dump($name . "✅");
    }
    ?></pre>


    <a href="type_casting.php?<?php echo http_build_query(['name' => ['Saemi', 'Song']]) ?>">이동</a>
</body>
</html>