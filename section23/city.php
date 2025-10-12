<?php
require __DIR__ . '/inc/all.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';

$id = (int) ($_GET['id'] ?? 0);

$worldCityRepository = new WorldCityRepository($pdo);
$city = $worldCityRepository->fetchById($id);

// id 존재하지 않을 경우 index.php로 리다이렉션
if ( empty($city) ) {
    header('Location: index.php');
    die();
}

render('city.view.php', [
    'city' => $city,
]);