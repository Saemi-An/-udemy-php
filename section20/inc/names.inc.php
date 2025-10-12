<?php
declare(strict_types=1);

// index.php
// 가장 많이 사용된 이름과 그 횟수 가져오는 함수
function fetch_popular_names():array {
    global $pdo;

    $stmt = $pdo->prepare(
            "SELECT `name`, SUM(`count`) AS 'sum'
            FROM `names`
            GROUP BY `name`
            ORDER BY `sum` DESC
            LIMIT 10;"
        );
    $stmt->execute();

    return $stmt->fetchall(PDO::FETCH_ASSOC);
}



// char.php
// 특정 알파벳으로 시작하는 이름 목록을 가져오는 함수
function fetch_names_by_alphabet(string $char, int $pageNum = 1, $perPage = 10): array {
    global $pdo;

    // [예외 처리] 페이지가 음수인 경우
    $pageNum = max(1, $pageNum);

    if ( $char === '' ) {
        return [];
    }
    else {
        $stmt = $pdo->prepare(
            "SELECT DISTINCT `name`
             FROM `names`
             WHERE `name` LIKE :exp
             ORDER BY `names`.`name` ASC
             LIMIT :limit OFFSET :offset;"
        );
        $stmt->bindValue(':exp', "{$char}%");
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $perPage * ($pageNum - 1), PDO::PARAM_INT);
        $stmt->execute();
        $names = $stmt->fetchall(PDO::FETCH_ASSOC);
    
        $filtered_names = [];
        foreach ( $names AS $name ) {
            $filtered_names[] = $name['name'];
        }
    
        return $filtered_names;
    }
}

// char.php
// 페이지네이션
function get_names_count(string $char): int {
    global $pdo;

    $stmt = $pdo->prepare(
            "SELECT COUNT(DISTINCT `name`) AS 'count'
             FROM `names`
             WHERE `name` LIKE :exp"
        );
    $stmt->bindValue(':exp', "{$char}%");
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
}




// name.php
// 특정 이름이 붙여진 아기 수와 연도 가져오는 함수
function fetch_detail_by_name(string $name): array {
    global $pdo;

    $stmt = $pdo->prepare("SELECT `year`, `count` FROM `names` WHERE `name` = :name ORDER BY `year` DESC;");
    $stmt->bindValue(':name', $name);
    $stmt->execute();
    $detail = $stmt->fetchall(PDO::FETCH_ASSOC);

    return $detail;
}
