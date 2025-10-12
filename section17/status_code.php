<?php
function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

$id = (!empty($_GET['id']) ? (int) $_GET['id'] : 1);

if ( $id >= 5 ) {
    require __DIR__ . '/' . 'not_found.php';
    die();
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상태 코드</title>
</head>
<body>
    <header><h1>뉴스 레터</h1><header>
    <main>
        <p>뉴스 아이디: <?php echo e($id); ?></p>
    </main>
</body>
</html>