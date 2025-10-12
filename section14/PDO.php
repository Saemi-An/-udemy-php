<pre><?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, "UTF-8");
}

// pdo로 데이터베이스 커넥션, 유저, 비밀번호, [옵션::데이터베이스 커넥션 실패시 에러메세지 노출]
// $pdo = new PDO("mysql:host=localhost;dbname=note_app;", "root", "", [
$pdo = new PDO("mysql:host=127.0.0.1;dbname=note_app;", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$query = "SELECT `title`, `content` FROM `notes` ORDER BY `title` ASC";

// 1. prepare(): SQL문을 데이터베이스 서버에 미리 준비시킴. SQL 쿼리의 문법 체크 및 쿼리 실행 준비
$stmt = $pdo->prepare($query);

// 2. execute(): prepare()로 준비된 쿼리를 실제로 데이터베이스에서 실행함
    // 만약 prepare()에서 플레이스홀더(?)를 사용했다면, execute()를 호출할 때 실제 값을 바인딩하여 실행함
    // 쿼리 실행 후 결과를 반환하며, SELECT 쿼리인 경우 결과를 추출할 수 있도록 함
$stmt->execute();

// 3. fetchAll():  쿼리 실행 후, 모든 결과를 배열 형태로 반환함
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($results);


?></pre>

<ul>
    <?php foreach( $results AS $r ): ?>
    <li>
        <p><?php echo e($r["title"]); ?></p>
        <pre><?php echo e($r["content"]); ?></pre>
    </li>
    <?php endforeach; ?>
</ul>