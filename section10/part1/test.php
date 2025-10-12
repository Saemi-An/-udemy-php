

<pre>
<?php
require_once __DIR__ . "/inc/functions.inc.php";
$dates = [
    "2025-08-01",
];
$results = [
    "2025-08-01" => [
        "pm10" => [],
        "pm25" => [],
    ],
];

$data = readCSV("openaq_misa.csv");


$dateLocal = substr($data[0]["datetimeLocal"], 0, 10);

// 월별 평균값
foreach ($data AS $d) {
    
    $param = $d["parameter"];
    $localDate = substr($data[0]["datetimeLocal"], 0, 10);

    if ( $localDate === "2025-08-01") {

        if ( $param === "pm10" ) {
            // $idx = count($results[$localDate]["pm10"]) ? count($results[$localDate]["pm10"]) + 1 : 0;
            array_push($results[$localDate]["pm10"], $d["value"]);

        }
    }
    // break;
}


var_dump(count($results[$dateLocal]["pm10"]));


?>
</pre>