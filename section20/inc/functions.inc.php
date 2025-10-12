<?php
// 공통
function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

// 렌더링 함수
function render($view, $params) {
    extract($params);
    
    // Output Buffering
    ob_start();
    require __DIR__ . '/../views/pages/' . $view;
    $contents = ob_get_clean();
    
    // 메인
    $alphabet = gen_alphabet();
    require __DIR__ . '/../views/layouts/main.view.php';
}

// 알파벳 배열 만들기 - ['A', 'B', 'C', ..., 'Z']
function gen_alphabet() {

    $A = ord('A');
    $Z = ord('Z');

    $alphabet_ary = [];
    for ( $i = $A; $i <= $Z; $i++ ) {
        $alphabet_ary[] = chr($i);
    }
    
    return $alphabet_ary;
}
