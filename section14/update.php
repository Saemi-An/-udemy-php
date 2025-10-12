<pre><?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
}

$pdo = new PDO("mysql:host=127.0.0.1;dbname=note_app;", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$my_id = 8;
$my_title = '더미 3 업데이트';
$my_cnt = '더미 3 업데이트 상세';

$stat = $pdo->prepare('UPDATE `notes` SET `title` = :title, `content` = :content WHERE `id` = :id');
$stat->bindValue('id', $my_id);
$stat->bindValue('title', $my_title);
$stat->bindValue('content', $my_cnt);



$stat->execute();

// var_dump($stat->fetch(PDO::FETCH_ASSOC));

?></pre>
