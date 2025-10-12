<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php 

// 배열의 중복요소
$circles = [
    "Saemi",
    "Song",
    "Hansol",
    "Saemi",
    "Saemi",
    "Cho-Won",
    "Arthur",
    "Saemi",
    "Hwa-Yong",
];

// 중복 제거하고 새로운 배열 반환
$clean_circles = array_unique($circles);
var_dump($clean_circles);

// 원본배열을 알파벳 순으로 정렬하여 반환
sort($circles);
var_dump($circles);
        
        
        
        ?>
    </pre>
</body>
</html>