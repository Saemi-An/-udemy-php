<pre><?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
}

$pdo = new PDO("mysql:host=127.0.0.1;dbname=note_app;", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$stat = $pdo->prepare('DELETE FROM `notes` WHERE `id` = :id');
$stat->bindValue('id', 7);

$stat->execute();

// var_dump($stat->fetch(PDO::FETCH_ASSOC));

?></pre>
