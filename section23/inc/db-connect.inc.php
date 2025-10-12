<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=cities;charset=utf8mb4', 'cities', 'saemi123', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    var_dump($e->getMessage());
    echo '데이터베이스 연결 중 문제 발생..';
    die();
}