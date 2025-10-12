<pre><?php

// php<=8.1 에서는 데이터베이스 커넥션 실패시 DB Password가 그대로 에러메세지에 떴었음.
try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=note_app;charset=utf8mb4", "root", "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
// 데이터베이스 커넥션 실패하면 그냥 코드를 죽이는 예외처리
catch ( PDOException $e ) {
    echo "데이터베이스 연결 실패...";
    die();
}


// 데이터베이스 연결 설정 옵션에 "charset=utf8mb4" 안 넣어주면 서버 기본 config에 따라 이모티콘이나 영어 이외의 문자 오류날 수 있음으로 주의
$stat = $pdo->prepare('INSERT INTO `notes` (`title`, `content`) VALUES (:title, :content)');
$stat->bindValue(':title', "🐷");
$stat->bindValue(':content', "🐖🐖🐖🐖");
$stat->execute();



?></pre>
