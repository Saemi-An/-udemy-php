<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .bgco_1 { background-color: lightblue; }
        .bgco_2 { background-color: lightcoral; }
        .bgco_3 { background-color: lightgreen; }
        .bgco_4 { background-color: lightsalmon; }
        .bgco_5 { background-color: lightslategrey; }
    </style>
</head>
<body class="bgco_<?php echo rand(1, 5); ?>">
    
    <h1>PHP generates HTML</h1>

    <?php echo "<h2>Your browser doesn't know if it's from PHP or HTML</h2>"; ?>
    
</body>
</html>