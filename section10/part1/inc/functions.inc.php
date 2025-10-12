<?php

// html-safe
function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
}

// .csv 파일 읽기
function readCSV($name) {
    $csvFile = __DIR__ . "/../../data/{$name}";
    $handle = fopen($csvFile, 'r');
    
    $data = [];
    
    if ($handle !== false) {
        $headers = fgetcsv($handle); // 첫 번째 줄: 헤더
    
        while (($row = fgetcsv($handle)) !== false) {
            $data[] = array_combine($headers, $row); // 헤더와 데이터 결합
        }
    
        fclose($handle);
    }
    return $data;
}

?>