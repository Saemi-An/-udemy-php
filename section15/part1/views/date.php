<pre><?php

// UNIX timestamp - The number of seconds since 1970-01-01
var_dump(time());

// 타임존 설정 (php 스크립트가 실행되는 동안에만 유효)
date_default_timezone_set('Asia/Seoul');
var_dump(date('Y.m.d H:i'));

echo "\n\n";
// UNIX 타임스탬프를 사용하여 날짜 구하기

// mktime(시, 분, 초, 달, 일, 연) => (int) UNIX 타임스탬프로 특정 날짜 표현하기
$year = 2024;
$month = 12;
$day = 10;
$hour = 20;
$minutes = 53;
var_dump(mktime($hour, $minutes, 0, $month, $day, $year));

// D+ 구하기
$timestamp = mktime($hour, $minutes, 0, $month, $day, $year);
var_dump(time() - $timestamp);

// date(포맷, (표현할 시각)) => (string) 날짜
date_default_timezone_set('Asia/Seoul');
var_dump(date('Y.m.d H:i', $timestamp));


echo "\n\n";
// strtotime(시각) => (int) 해당 시간의 유닉스 타임스탬프
$strDate = '2024-12-10 20:53:00';
echo '타겟 시각: '; var_dump($strDate);
var_dump(strtotime($strDate));

var_dump(date('Y.m.d H:i', strtotime($strDate)));


// date('Y.m.d H:i', $result['date']);

?></pre>