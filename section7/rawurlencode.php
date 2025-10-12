<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .test {
            width: 300px;
            aspect-ratio: 1080/1920;
        }
    </style>
</head>
<body>
    <?php
        function e($value) {
            return htmlspecialchars($value, ENT_QUOTES, "UTF-8");
        }
        $imgfile = "rawurlencode.jpeg";
    ?>
    <img src="./<?php echo rawurlencode($imgfile); ?>" alt="" class="test">
    <img src="./<?php echo rawurlencode($imgfile); ?>" alt="" class="test">
</body>
</html>