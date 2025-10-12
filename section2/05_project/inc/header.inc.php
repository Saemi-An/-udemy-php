<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="statistics/css/style.css">
    <title>미니 프로젝트 &bull; <?php if (!empty($pageTitle)) echo $pageTitle; else echo '미정' ?></title>
</head>
<body>
    <header class="header header-bg" style="background-image: url(statistics/images/<?php if (!empty($headerImg)) echo $headerImg; else echo 'default_header'; ?>.jpg)">
        <h1>타이틀</h1>
        <p>해당 페이지 설명</p>
        <nav class="header__nav">
            <?php if (!isset($pageTitle)) $pageTitle = '' ?>

            <a href="main1.php" class="header__nav__a <?php if ($pageTitle === '메인1') echo 'active'; ?>">메뉴1</a>
            <a href="main2.php" class="header__nav__a <?php if ($pageTitle === '메인2') echo 'active'; ?>">메뉴2</a>
            <a href="main3.php" class="header__nav__a <?php if ($pageTitle === '메인3') echo 'active'; ?>">메뉴3</a>
            <a href="main4.php" class="header__nav__a <?php if ($pageTitle === '메인4') echo 'active'; ?>">메뉴4</a>
        </nav>
    </header>

    <main class="main">