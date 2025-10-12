<?php
declare(strict_types=1);

use App\Weather\FakeWeatherFetcher;
use App\Weather\RandomWeatherFetcher;
use App\Weather\RemoteWeatherFetcher;

date_default_timezone_set('Asia/Seoul');

require __DIR__ . '/inc/all.inc.php';


$city = (string) (e($_GET['city']) ?? 'Seoul');

$fetcher = new RemoteWeatherFetcher();
$info = $fetcher->fetch($city);

if ( empty($info) ) {
    echo "날씨 데이터를 불러오는데 문제가 발생하였습니다.";
    die();
}

require __DIR__ . '/views/index.view.php';
