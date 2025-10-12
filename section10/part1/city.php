<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>미세먼지 판독기 | 지역 상세</title>
    <link rel="stylesheet" href="static/style.css"></link>
</head>
<body>
    <?php require_once __DIR__ . "/inc/functions.inc.php"; ?>
    <?php require_once __DIR__ . "/views/header.inc.php"; ?>
    <?php 
        $city = $_GET["city"] ?? null;
        $index = json_decode(file_get_contents(__DIR__ . "/../data/index.json"), true);

        // param이 비어있지는 않은지 확인
        if ( !empty($city) ) {

            $country = null;
            $flag = null;
            // param과 일치하는 country, flag 확인

            // param과 일치하는 파일명 확인
            $filename = null;
            foreach ( $index AS $idx ) {
                if ( $idx["city"] === $city ) {
                    $filename = $idx["filename"];
                    $country = $idx["country"];
                    $flag = $idx["flag"];
                    break;
                }
            }

            // param과 일치하는 파일명이 존재하는지 확인
            if ( !empty($filename) ) {
                $results = json_decode(file_get_contents("compress.bzip2://" . __DIR__ . "/../data/$filename"), true)["results"];
                
                // 단위 추출
                $units = [
                    "pm25" => null,
                    "pm10" => null,
                ];
                foreach ( $results AS $result ) {
                    if ( !empty($units["pm25"]) && !empty($units["pm10"]) ) break;
                    if ( $result["parameter"] === "pm25" ) {
                        $units["pm25"] = $result["unit"];
                    }
                    if ( $result["parameter"] === "pm10" ) {
                        $units["pm10"] = $result["unit"];
                    }
                }
                
                // 월간 평균 추출
                $stats = [];
                foreach ( $results AS $result ) {
                    // value error이면 패스
                    if ( $result["parameter"] !== "pm25" && $result["parameter"] !== "pm10" ) continue;
                    if ( $result["value"] < 0 ) continue;

                    // month 키 없으면 생성
                    $month = substr($result["date"]["local"], 0, 7);
                    if ( !isset($stats[$month]) ) {
                        $stats[$month] = [
                            "pm25" => [],
                            "pm10" => [],
                        ];
                    }

                    // 값 추가
                    $stats[$month][$result["parameter"]][] = $result["value"];
                    
                }
            }

            $labels = array_keys($stats);
            sort($labels);

            $pm25 = [];
            $pm10 = [];
            foreach ( $labels AS $label ) {
                $measurements = $stats[$label];
                $pm25[] = array_sum($measurements["pm25"]) / count($measurements["pm25"]);
                
                if ( count($measurements["pm10"]) === 0 ) continue;
                $pm10[] = array_sum($measurements["pm10"]) / count($measurements["pm10"]);
            }
        }
    ?>

    
    <div class="go_back_container">
        <a href="index.php">뒤로가기</a>
    </div>
    <main class="main">
    <!-- 헤드 -->
    <h1><?php echo e($flag) . " " . e($city) . ", " . e($country);; ?></h1>

    <?php if ( !empty($city) ): ?>
        
        <?php if ( !empty($stats) ): ?>

            <!-- 그래프 -->
            <canvas class="chart_container" id="chart_container"></canvas>
            
            <script src="../scripts/chart.umd.js"></script>
            <script>
                const ctx = document.getElementById("chart_container");
                const chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($labels); ?>,
                        datasets: [
                            {
                                label: <?php echo json_encode("Air Quality, PM2.5 in {$units['pm25']}"); ?>,
                                data: <?php echo json_encode($pm25); ?>,
                                fill: false,
                                borderColor: "rgba(192, 75, 190, 1)",
                                tension: 0.1
                            },
                            <?php if ( !empty($pm10) ): ?>
                            {
                                label: <?php echo json_encode("Air Quality, PM10 in {$units['pm10']}"); ?>,
                                data: <?php echo json_encode($pm10); ?>,
                                fill: false,
                                borderColor: "rgb(75, 192, 192)",
                                tension: 0.1
                            },
                            <?php endif; ?>
                        ]
                    },
                });
            </script>

            <!-- 테이블 -->
            <table>
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>PM 2.5</th>
                    <?php if ( !empty($measurements["pm10"]) ): ?>
                        <th>PM 10</th>
                    <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $stats AS $month => $measurements ): ?>
                        <tr>
                            <th><?php echo e($month); ?></th>
                            <td><?php echo e(round(array_sum($measurements["pm25"]) / count($measurements["pm25"]), 2)); echo " " . e($units["pm25"]); ?></td>
                        <?php if ( !empty($measurements["pm10"]) ): ?>
                            <td><?php echo e(round(array_sum($measurements["pm10"]) / count($measurements["pm10"]), 2)); echo " " . e($units["pm10"]); ?></td>
                        <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif ?>

    <?php else: ?>

        <p>There is no data that you are looking for.</p>
    
    <?php endif ?>
        
    </main>
    
    <?php require_once __DIR__ . "/views/footer.inc.php"; ?>
</body>
</html>