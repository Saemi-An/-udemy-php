<?php require __DIR__ . '/' . 'inc/all.inc.php';

$statistics = fetch_popular_names();

// 뷰 렌더링
render("index.view.php", [
    'statistics' => $statistics,
]);

