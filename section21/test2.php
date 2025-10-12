<?php

// TASK 1 - 모든 a태그의 href 값(링크)를 배열에 담기
$links = [];
$links_with_href = null;
preg_match_all('/href="\w+:\/\/\w+\.\w+\/?\w*"/', $htmlContent, $links_with_href);

// href="와 마지막 " 제거
foreach( $links_with_href[0] AS $elem ) {
    $links[] = substr($elem, 6, -1);
}


// TASK 2 - <i> 태그를 <em> 태그로 변환. 단, 태그 안 텍스트는 유지
$emphasizedHtmlContent = preg_replace('/<(\/?)i>/', '<$1em>', $htmlContent);


// TASK 3 - alt 속성이 없는 img 태그를 찾아 alt="placeholder image"를 넣어주기
$alt_val = "placeholder image";
$accessibleHtmlContent = '';

$img_without_alt = [];
preg_match_all('/<img\b(?![^>]*\balt=)[^>]*>/i', $htmlContent, $img_without_alt);
var_dump($img_without_alt[0]);

$new_img_tags = [];
foreach ( $img_without_alt[0] AS $img ) {
   $new_img_tags[] = substr($img, 0, -1) . ' alt="' . $alt_val . '">';
}

for ( $i = 0; $i < count($img_without_alt[0]); $i++ ) {
    $target = $img_without_alt[0][$i];
    $safe_target = preg_quote($target, '/');
    $accessibleHtmlContent = preg_replace("/$safe_target/", $new_img_tags[$i], $htmlContent);
}
