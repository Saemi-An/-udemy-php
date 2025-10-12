<?php
// names
// saemi123

try {
    $pdo = new PDO('mysql:host=localhost;dbname=names;charset=utf8mb4', 'names', 'saemi123', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch ( PDOException $e ) {
    // var_dump($e->getMessage());
    echo '[연결 오류] 데이터베이스 연결 중 오류 발생';
    die();
}

// 연결 테스트
// $stat = $pdo->prepare('SELECT * FROM `names`');
// $stat->execute();
// var_dump($stat->fetch(PDO::FETCH_ASSOC));
