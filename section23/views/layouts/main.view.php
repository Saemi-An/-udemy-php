<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- index.php 위치 기준 경로 -->
    <link rel="stylesheet" type="text/css" href="styles/style.css"><link>
    <title>PJ | Cities</title>
</head>
<body>
    <header class="header">
        <h1><a href="index.php">🌏 세계 도시 탐색 🗺️</a></h1>
        <p>전 세계 도시와 인구수를 탐색해 보자!</p>
    </header>
    <main class="main">
        <?php echo $contents; ?>
    </main>
    <footer class="footer">
        <ul>
            <li>프로젝트 시작일: 2025.10.09</li>
            <li>프로젝트 마감일: (현재 진행중)</li>
            <li>출처: Modern PHP: The Complete Guide - from Beginner to Advanced By Jannis Seemann</li>
        </ul>
    </footer>
</body>
</html>