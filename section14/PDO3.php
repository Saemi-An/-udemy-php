<pre><?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
}

$pdo = new PDO("mysql:host=127.0.0.1;dbname=note_app;", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// 쿼리스트링으로 받은 값 그대로 사용할 경우, 출력값은 마지막 id로 출력됨
// $get_id = $_GET["id"];
// $query = "SELECT * FROM `notes` WHERE `id` = $get_id";
// $stat = $pdo->prepare($query);

// 플레이스 홀더를 사용하여 안전하게 쿼리문 작성시, 첫번째 id 이후는 모두 무시됨
// :id - 플레이스홀더
$stat = $pdo->prepare('SELECT * FROM `notes` WHERE `id` = :id');

// 플레이스홀더 자리에 들어가야할 값 지정
$stat->bindValue('id', $_GET['id']);




$stat->execute();

var_dump($stat->fetch(PDO::FETCH_ASSOC));

?></pre>
