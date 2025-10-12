<?php
declare(strict_types=1);

require __DIR__ . '/inc/all.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';


$worldCityRepository = new WorldCityRepository($pdo);


// 페이징 
// 현재 페이지를 쿼리스트링에서 가져오기
$crntPage = (int) ($_GET['page'] ?? 1);

// [예외 처리] 문자열 등 유효하지 않은 page의 경우 1로 설정
$crntPage = max(1, $crntPage);

// 전체 페이지 정보 가져오기
$perPage = 15;
$totalPage = (int) ceil($worldCityRepository->count() / $perPage);

// 페이지별 정보 DB fetch
$perPage = 15;
$entries = $worldCityRepository->paginate($crntPage, $perPage);

// [예외 처리] 너무 큰 페이지 넘버의 경우 리다이렉션
if ( $crntPage > $totalPage ) {
    header('Location: index.php?page=1');
    die();
}

render('index.view.php', [
    'entries' => $entries,
    'crntPage' => $crntPage,
    'totalPage' => $totalPage,
]);