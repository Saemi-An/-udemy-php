<?php

try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=diary;charset=utf8mb4", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch ( PDOException $e ) {
    echo "데이터베이스 연결 실패..";
    die();
}
