<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cross-Site-Scripting</title>
</head>
<body>
    
    <pre><?php
    // var_dump($_POST);
    function e($value) {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    };
    ?></pre>

    <form action="xss.php" method="POST">
        <label for="id">아이디: <input type="text" name="id" value="<?php if( !empty($_POST["id"]) ) echo e($_POST["id"]) ?>"></label>
        <button type="submit">제출</button>
    </form>

</body>
</html>