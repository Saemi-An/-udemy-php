<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
$personal_info = [
    "Saemi" => 29,
    "Song" => 33,
    "Arthur" => 13,
    "Cho-Won" => 14,
    "Samuel" => "",
];

var_dump($personal_info);
echo "\n";
var_dump($personal_info["Saemi"]);
var_dump(isset($personal_info['Sera']));
var_dump(empty($personal_info["Samuel"]));

// 요소 추가
echo "\n";
$personal_info['Hwa-Young'] = 55;
var_dump($personal_info);

// 요소 삭제
echo "\n";
unset($personal_info["Samuel"]);
var_dump($personal_info);

// 값 순회
echo "\n";
foreach ( $personal_info AS $person ) {
    var_dump($person);
};

// 키와 값 순회
echo "\n";
foreach ( $personal_info AS $name => $age ) {
    echo "이름: {$name}, 나이: {$age}\n";
};

// 키 또는 값들만 조회 => 배열로 반환
echo "\n";
var_dump(array_keys($personal_info));
echo gettype(array_keys($personal_info));

echo "\n";
var_dump(array_values($personal_info));
echo gettype(array_values($personal_info));

echo "\n";
foreach ( $personal_info AS $name => $_ ) {
    echo "{$name} ";
};
    
    
    ?></pre>
</body>
</html>