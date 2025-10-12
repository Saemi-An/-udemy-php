<?php
require __DIR__ . '/inc/all.inc.php';
require __DIR__ . '/inc/db-connect.inc.php';

$id = (int) ($_GET['id'] ?? 0);

$worldCityRepository = new WorldCityRepository($pdo);
$model = $worldCityRepository->fetchById($id);

// id 존재하지 않을 경우 index.php로 리다이렉션
if ( empty($model) ) {
    header('Location: index.php');
    die();
}

// 
if ( !empty($_POST) ) {
    $city = (string) ($_POST['city'] ?? '');
    $country = (string) ($_POST['country'] ?? '');
    $iso2 = (string) ($_POST['iso2'] ?? '');
    $population = (int) ($_POST['population'] ?? 0);

    if ( empty($city) || empty($country) || empty($iso2) || empty($population) ) {
        header('Location: index.php');
        die();
    }

    $model = $worldCityRepository->update($id, [
        'city' => $city,
        'country' => $country,
        'iso2' => $iso2,
        'population' => $population,
    ]);

    header('Location: index.php');
    die();
};

render('edit.view.php', [
    // 'city' => $model,
    'city' => $model,
]);