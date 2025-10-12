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
    
// 배열의 요소의 인덱스 찾기
var_dump(array_search('Cho-Won', $circles));

// 배열 슬라이싱: array_slice($배열_변수명, 시작 인덱스, 시작 인덱스로부터 요소 몇개)
var_dump(array_slice($circles, 3, 2));

// 숫자 배열 전용 함수들
echo "\n\n\n\n";

$nums = [1, 2, 3, 4, 5, 6, 7, 8, 9];

var_dump(min($nums));
var_dump(max($nums));
var_dump(array_sum($nums));   // 합계
var_dump(array_sum($nums) / count($nums));   // 평균


// 배열 병합 - 1
echo "\n\n\n\n";
$topics = ["퍼블리싱", "서버"];
$additional_topics = ["보안", "데이터베이스"];

$results = array_merge($topics, $additional_topics);
var_dump($results);

// 배열 병합 - 2
    // 장점: 중간에 새로운 엘리먼트 삽입 가능
echo "\n\n";
var_dump([...$topics, '졸리다!', ...$additional_topics]);



echo "테스트\n\n\n\n\n\n\n\n\n\n";

$origin = ['A', 'B', 'C', 'D'];
$demo = ['B', 'D'];
$origin = array_values(array_diff($origin, $demo));


$age = 29;
$result = "Hello, my age is " . $age;

$watingList = ['Ava Stone', 'Dylan Marsh', 'Emma Lake', 'Grace Hill', 'Henry Cole', 'Kyle Brook', 'Lily Snow', 'Mason Cliff', 'Nora Field', 'Sophia Forest'];
sort($watingList);
var_dump(array_slice($watingList, 0, 5));

    ?></pre>


</body>
</html>

