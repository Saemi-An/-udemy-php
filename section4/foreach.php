<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php

$circles = [
    "Saemi",
    "Song",
    "Hansol",
    "Cho-Won",
    "Arthur",
    "Hwa-Yong",
];
    
foreach ( $circles AS $circle ) {
    if ( $circle === 'Song' ) break;
    echo "{$circle}\n";
}    


echo "\n";    

    ?></pre>

    <!-- foreach 루프 phtml로 표현하기 -->
    <ul>
    <?php foreach ( $circles AS $circle ): ?>
        <?php if ( $circle === 'Hansol' ) continue; ?>
        <li><?php echo "{$circle}" ?></li>
    <?php endforeach; ?>
    </ul>

</body>
</html>