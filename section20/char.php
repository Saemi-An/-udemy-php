<?php require __DIR__ . '/' . 'inc/all.inc.php';

// char 파라미터 검증
$char = strtoupper( (string) ($_GET['char'] ?? '') );
if ( strlen($char) > 1 ) {
    $char = $char[0];
}

// [예외 처리] index.php로 리다이렉션
// char.php 파일에 쿼리스트링 없이 접근시
// $char가 알파벳이 아닌 경우 
$alphabets = gen_alphabet();
if ( strlen($char) === 0 || !in_array($char, $alphabets) ) {
    header('Location: index.php');
    die();
}


// page 파라미터 검증
$crntPage = (int) ($_GET['page'] ?? 1);

// 선택된 알파벳으로 시작하는 이름들 가져오기 + 페이징
$perPage = 10;
$filtered_names = fetch_names_by_alphabet($char, $crntPage, $perPage);

// 전체 이름 개수 구하기
$total_names = get_names_count($char);
$total_pages = ($total_names / $perPage) > 1 ? ceil($total_names / $perPage) : 1;


// 뷰 렌더링
render("char.view.php", [
    'char' => $char,
    'filtered_names' => $filtered_names,
    'pagination' => [
        'crnt_page' => $crntPage,
        'total_names' => $total_names,
        'total_pages' => $total_pages,
    ],
]);
?>



