<pre><?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
}

$pdo = new PDO("mysql:host=127.0.0.1;dbname=note_app;", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = "SELECT * FROM `notes` ORDER BY `title` DESC";
// $query = "SELECT `title`, `content` FROM `notes` WHERE `id` IN (1, 2)";

$stmt = $pdo->prepare($query);
$stmt->execute();

while ( $result = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    // var_dump($result);
}



$query2 = "SELECT * FROM `notes` WHERE `id` = 1";
$stat = $pdo->prepare($query2);
$stat->execute();
var_dump($stat->fetch(PDO::FETCH_ASSOC));

?></pre>
