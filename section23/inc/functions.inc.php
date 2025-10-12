<?php
// 공통
function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

// iso2 -> 이모티콘 변환 함수
function get_flag_of_contry(string $iso2): string {
    $iso2 = strtolower($iso2);
    if ( strlen($iso2) !== 2 ) {
        // [예외 처리] $iso2 - 문자 두개 길이가 아님
        return $iso2;
    }

    // (a 이모티콘 + 타겟[0] 문자 유니코드 - a 유니코드: 타겟[0] 이모티콘) 
    return mb_chr(127462 + ord($iso2[0]) - ord('a')) . mb_chr(127462 + ord($iso2[1]) - ord('a'));
}

// 렌더링 함수
function render($view, $params) {
    extract($params);
    
    // Output Buffering
    ob_start();
    require __DIR__ . '/../views/pages/' . $view;
    $contents = ob_get_clean();
    
    // 메인
    require __DIR__ . '/../views/layouts/main.view.php';
}
