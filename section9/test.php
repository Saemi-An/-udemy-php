<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
$campaigns = [
    'Spring Sale' => [
        'AdSet1' => [
            'name' => 'Discounted Gadgets'
        ],
        'AdSet2' => [
            'name' => 'Outdoor Equipment'
        ],
    ],
    'Holiday Deals' => [
        'AdSet1' => [
            'name' => 'Winter Apparel'
        ],
        'AdSet2' => [
            'name' => 'Electronics Special'
        ],
    ],
];
// - Spring Sale: "Discounted Gadgets", "Outdoor Equipment"
// - Holiday Deals: "Winter Apparel", "Electronics Special"
    
foreach ( $campaigns AS $name => $sets ) {
    echo "- " . $name . ": ";

    foreach ( $sets AS $key => $val ) {

        // array_search(찾을 값, 배열)은 "값"을 기준으로 배열에서 해당 값의 인덱스를 찾아줌
        $keys = array_keys($sets);
        if ( array_search($key, $keys) === (count($sets)-1) ) {
            // 마지막 공백 없음
            echo '"' . array_values($val)[0] . '"';
        } else {
            echo '"' . array_values($val)[0] . '", ';
        }
    }
    echo "\n";
}
    
    
$test = [
    'AdSet1' => [
        'name' => 'Winter Apparel'
    ],
    'AdSet2' => [
        'name' => 'Electronics Special'
    ],
];

$keys = array_keys($test);
var_dump(array_search("AdSet1", $keys));
    
    ?></pre>
</body>
</html>