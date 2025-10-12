<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    

    
    
    
    
    ?></pre>
    <a href="urls.php?name=Song Oh&status=expired">이동하기</a>
    <a href="urls.php?name=Sam & Song&status=subscribed">이동하기2</a>

    <br>

    <a href="urls.php?<?php echo http_build_query(['name' => 'Sam & Song', 'status' => 'subscribed']); ?>">이동하기3</a>
    <!-- 짧은 버전 -->
    <a href="urls.php?<?= http_build_query(['name' => 'Sam & Song', 'status' => 'subscribed']); ?>">이동하기3</a>

</body>
</html>