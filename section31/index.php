<?php

require __DIR__ . '/inc/all.inc.php';

// 컨테이너 패턴
$container = new \App\Helper\Container();

$container->bind('pdo', function() {
    return require __DIR__ . '/inc/db-connect.inc.php';
});

$pdo = $container->get('pdo');

$container->bind('pagesRepository', function() use ($container) {
    $pdo = $container->get('pdo');
    return new \App\Repository\PagesRepository($pdo);
});

$container->bind('pagesController', function() use ($container) {
    $pagesRepository = $container->get('pagesRepository');
    return new \App\Frontend\Controller\PagesController($pagesRepository);
});

$container->bind('notFoundController', function() use ($container) {
    $pagesRepository = $container->get('pagesRepository');
    return new \App\Frontend\Controller\NotFoundController($pagesRepository);
});

$container->bind('pagesAdminController', function() use ($container) {
    $pagesRepository = $container->get('pagesRepository');
    return new \App\Admin\Controller\PagesAdminController($pagesRepository);
});



// GET 요청 파라미터
$route = @(string) ($_GET['route'] ?? 'pages');


// 페이지 렌더링
if ( $route === 'pages' ) {
    $page = @(string) ($_GET['page'] ?? 'index');

    $pagesController = $container->get('pagesController');
    $pagesController->showPage($page);
}
else if ( $route === 'admin/pages' ) {
    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->index();
}
else if ( $route === 'admin/pages/create' ) {
    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->create();
}
else if ( $route === 'admin/pages/delete' ) {
    // 인덱스는 라우팅에 집중, 파라미터 유효성 검사는 컨트롤러에서 (동일한 유효성 검증 로직이 다양한 곳에서 사용될 경우 함수로 만들어 사용할 수도 있음)
    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->delete();
}
else if ( $route === 'admin/pages/edit' ) {
    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->edit();
}
else {
    $notFoundController = $container->get('notFoundController');
    $notFoundController->error404();
}