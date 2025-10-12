<?php
$alphabet = gen_alphabet();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- index.php 기준 경로 -->
    <link rel="stylesheet" href="styles/styles.css"><link>
    <title>PJ | 이름 찾기</title>
</head>
<body>
    <header>
        <h1>
            <a href="index.php">이름 찾기</a>
        </h1>
        <p>가장 많이 지어진 이름을 연도별로 알아보자!</p>

        <nav class="nav">
            <?php foreach( $alphabet AS $alpha ): ?>
                <a href="char.php?<?php echo http_build_query(['char' => $alpha]); ?>"><?php echo $alpha; ?></a>
            <?php endforeach; ?>
        </nav>

    </header>
    <main class="main">
