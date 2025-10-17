<?php

require __DIR__ . '/inc/all.inc.php';

$route = @(string) ($_GET['route'] ?? 'pages');

// $_GET['route'] 값이 있는 경우, /index.php?route=chat 혹은 /index.php?route=news 등으로 다른 서비스를 암시할 수 있음 (구조 확장 고려)
// 라우트 없으면 비회원 접근 가능, 라우트 있으면 회원 전용 페이지 등으로 사용 가능!


// $_GET['route'] 값이 없는 경우
if ( $route === 'pages' ) {
    $page = @(string) ($_GET['page'] ?? 'index');

    $pagesRepository = new \App\Repository\PagesRepository($pdo);
    
    $pagesController = new \App\Frontend\Controller\PagesController($pagesRepository);
    
    $pagesController->showPage($page);
}
else {
    $pagesRepository = new \App\Repository\PagesRepository($pdo);
    $notFoundController = new \App\Frontend\Controller\NotFoundController($pagesRepository);
    $notFoundController->error404();
}