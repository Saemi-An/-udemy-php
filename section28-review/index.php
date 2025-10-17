<?php

require __DIR__ . '/inc/all.inc.php';


// 컨테이너 객체 생성
$container = new \App\Helper\Container();

// 컨테이너 속성값 recipes['pdo']을 익명 함수를 통해 등록, 등록된 값은 $pdo (DB 연결)
$container->bind('pdo', function() {
    return require __DIR__ . '/inc/db-connect.inc.php';
});

// DB 연결을 위한 객체를 컨테이너를 통해 생성
$pdo = $container->get('pdo');

// 컨테이너를 속성값 recipes['PagesRepository']를 익명 함수를 통해 등록, 등록된 값은 PagesRepository 객체
$container->bind('pagesRepository', function() use ($container) {
    $pdo = $container->get('pdo');
    return new \App\Repository\PagesRepository($pdo);
});

// 컨테이너를 속성값 recipes['pagesController']를 익명 함수를 통해 등록, 등록된 값은 pagesController 객체
$container->bind('pagesController', function() use ($container) {
    $pagesRepository = $container->get('pagesRepository');
    return new \App\Frontend\Controller\PagesController($pagesRepository);
});

// 컨테이너를 속성값 recipes['NotFoundController']를 익명 함수를 통해 등록, 등록된 값은 NotFoundController 객체
$container->bind('notFoundController', function() use ($container) {
    $pagesRepository = $container->get('pagesRepository');
    return new \App\Frontend\Controller\NotFoundController($pagesRepository);
});


/* 구조
    웹서버가 접근하는 것은 index.php 뿐이며, 해당 파일에서 호출되는 클래스로 모든 페이지들을 보여줌
    index.php에서는 들어오는 요청을 컨트롤러 객체에게 넘기고, 컨트롤러는 데이터 받고 페이지 렌더링하는 구조 
*/


/* route를 사용하는 이유
    route가 다르면 다른 서비스를 제공할 수 있음.
    eg) ?page=index 혹은 아무것도 없음 -- (비회원) 기본 홈
    eg) ?route=user&page=index -- (회원) 회원 전용 홈
*/

$route = @(string) ($_GET['route'] ?? 'pages');


// route가 기본값 일때
if ( $route === 'pages' ) {
    // 어떤 컨트롤러를 선택할 것인가
    $page = @(string) ($_GET['page'] ?? 'index');

    /* 컨테이너 패턴 적용 전 코드: 클래스를 통한 객체 생성
        // DB 커넥션 셋업
        $pagesRepository = new \App\Repository\PagesRepository($pdo);
        // (요청에 부합하는) 페이지 컨트롤러 셋업
        $pagesController = new \App\Frontend\Controller\PagesController($pagesRepository);
    */
    
    // 컨테이너 패턴 적용 후: 컨테이너를 통한 객체 생성
    $pagesController = $container->get('pagesController');
    
    // 컨트롤러를 통해 (요청에 부합하는) 페이지 렌더링
    $pagesController->showPage($page);
}
else {
    // 현재 네임스페이스와 무관하게 App\Frontend\Controller\NotFoundController 클래스를 찾음 (절대 경로)
    // /을 맨앞에 붙이지 않을 경우 현재 네임스페이스 기준 상대경로로 찾게됨

    /* 컨테이너 패턴 적용 전 코드: 클래스를 통한 객체 생성
    // DB 커넥션 셋업
    $pagesRepository = new \App\Repository\PagesRepository($pdo);
    // NotFoundController에서 error404 함수 호출
    $notFoundController = new \App\Frontend\Controller\NotFoundController($pagesRepository);
    */

    // 컨테이너 패턴 적용 후: 컨테이너를 통한 객체 생성
    $notFoundController = $container->get('NotFoundController');
    $notFoundController->error404();
}