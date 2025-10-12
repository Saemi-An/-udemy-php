<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>미세먼지 판독기</title>
    <link rel="stylesheet" href="static/style.css"></link>
</head>
<body>
    <?php require_once __DIR__ . "/inc/functions.inc.php"; ?>
    <?php require_once __DIR__ . "/views/header.inc.php"; ?>
    
    <pre><?php
    
    
    ?></pre>

    <main class="main">
        <?php $list = json_decode(file_get_contents(__DIR__ . "/../data/index.json"), true); ?>
        <div class="cities_container">
            <ul class="cities">
            <?php foreach ( $list AS $elem ): ?>
                <li>
                    <a href="city.php?<?php echo http_build_query(['city' => $elem['city']]); ?>" class="city">
                        <span class="emoji"><?php echo e($elem['flag']); ?></span>
                        <span><?php echo e($elem['country']) . " | " . e($elem['city']);?></span>
                    </a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
    </main>
    
    <?php require_once __DIR__ . "/views/footer.inc.php"; ?>
</body>
</html>