<?php

require __DIR__ . '/inc/all.inc.php';

// 컨테이너 패턴
$container = new \App\Helper\Container();

$container->bind('pdo', function() {
    return require __DIR__ . '/inc/db-connect.inc.php';
});

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

// 어드민
$container->bind('csrfHelper', function() {
    return new \App\Helper\CsrfHelper();
});

// 모든 POST 요청에 csrfHelper가 적용되도록
$csrfHelper = $container->get('csrfHelper');
$csrfHelper->handle();

// var_dump($csrfHelper->generateToken());
function csrf_token() {
    global $container;
    $csrfHelper = $container->get('csrfHelper');
    return $csrfHelper->generateToken();
}

$container->bind('authService', function() use($container) {
    $pdo = $container->get('pdo');
    return new \App\Admin\Helper\AuthService($pdo);
});
$container->bind('pagesAdminController', function() use ($container) {
    $authService = $container->get('authService');
    $pagesRepository = $container->get('pagesRepository');
    return new \App\Admin\Controller\PagesAdminController($authService, $pagesRepository);
});
$container->bind('loginController', function() use($container) {
    $authService = $container->get('authService');
    return new \App\Admin\Controller\LoginController($authService);
});


// GET 요청 파라미터
$route = @(string) ($_GET['route'] ?? 'pages');


// 페이지 렌더링
// 사용자 홈
if ( $route === 'pages' ) {
    $page = @(string) ($_GET['page'] ?? 'index');

    $pagesController = $container->get('pagesController');
    $pagesController->showPage($page);
}

// 어드민 로그인
else if ( $route === 'admin/login' ) {
    $loginController = $container->get('loginController');
    $loginController->login();
}
// 어드민 로그아웃
else if ( $route === 'admin/logout' ) {
    $loginController = $container->get('loginController');
    $loginController->logout();
}
// 어드민 홈
else if ( $route === 'admin/pages' ) {
    $authService = $container->get('authService');
    $authService->ensureLoggedIn();

    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->index();
}
// 어드민 새로운 페이지 생성
else if ( $route === 'admin/pages/create' ) {
    $authService = $container->get('authService');
    $authService->ensureLoggedIn();

    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->create();
}
// 어드민 페이지 삭제
else if ( $route === 'admin/pages/delete' ) {
    $authService = $container->get('authService');
    $authService->ensureLoggedIn();

    // 인덱스는 라우팅에 집중, 파라미터 유효성 검사는 컨트롤러에서 (동일한 유효성 검증 로직이 다양한 곳에서 사용될 경우 함수로 만들어 사용할 수도 있음)
    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->delete();
}
// 어드민 페이지 수정
else if ( $route === 'admin/pages/edit' ) {
    $authService = $container->get('authService');
    $authService->ensureLoggedIn();
    
    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->edit();
}

// 404 에러
else {
    $notFoundController = $container->get('notFoundController');
    $notFoundController->error404();
}