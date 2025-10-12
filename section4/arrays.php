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

// 배열 정의
$menus = array('financier', 'cake', 'scone', "today's-menu" . "❤️", 'tart');

// 배열 출력 1 - echo
echo $menus;
// Warning:  Array to string conversion

// 배열 출력 2 - var_dump()
// var_dump()는 PHP에서 변수의 값과 그 타입(type), 그리고 구조를 자세하게 출력해주는 디버깅 함수입니다.
var_dump($menus);
echo "\n";

// 배열 요소 출력
var_dump($menus[4]);
echo $menus[0] . "\n\n";

// 배열 변수 갖고 놀기
$myFavorit = $menus[3];
echo $myFavorit . "\n\n";

// 배열 정의 2
$myMenu = ["크림치즈 에그스콘(1)", "발로나 휘낭시에(1)", "솔티카라멜 휘낭시에(3)"];
var_dump($myMenu);

        ?>
    </pre>
</body>
</html>