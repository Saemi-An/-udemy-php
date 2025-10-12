<?php
require __DIR__ . '/' . 'inc/all.inc.php';

// name 파라미터 검증
$name = (string) ($_GET['name'] ?? '');

// param 없이 name.php 진입시 index.php로 이동
if ( empty($name) ) {
    header('Location: index.php');
    die();
}

$detail = fetch_detail_by_name($name);

// 뷰 렌더링
render("name.view.php", [
    'name' => $name,
    'char' => $name[0],
    'detail' => $detail,
]);