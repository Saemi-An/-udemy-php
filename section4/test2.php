<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <pre><?php
    
    $waiting = [1, 2, 3, 4, 5, 6, 7];
    $dummy_1 = [3];
    $dummy_2 = [5, 6];


    $waiting = [1, 2, 4, 7];
    
    // 두 dummy 배열을 합침
    $removeList = array_merge($dummy_1, $dummy_2);

    // $waiting에서 $removeList에 있는 값들을 제거
    $waiting = array_diff($waiting, $removeList);

    // 인덱스를 0부터 다시 정렬
    $waiting = array_values($waiting);

    print_r($waiting);
    
    
    
    ?></pre>
</body>
</html>

