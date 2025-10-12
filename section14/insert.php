<pre><?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
}

$pdo = new PDO("mysql:host=127.0.0.1;dbname=note_app;", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);


$my_title = '더미 3';
$my_cnt = '더미3 상세';

$stat = $pdo->prepare("INSERT INTO `notes` (`title`, `content`) VALUES (:title, :cnt)");
$stat->bindValue('title', $my_title);
$stat->bindValue('cnt', $my_cnt);



$stat->execute();

// var_dump($stat->fetch(PDO::FETCH_ASSOC));

?></pre>
