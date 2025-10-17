<?php

namespace App\Frontend\Controller;

use App\Repository\PagesRepository;


abstract class AbstractController {

    public function __construct(protected PagesRepository $pagesRepository){}

    // 렌더링
    protected function render($view, $params) {
        extract($params);
        
        ob_start();
        require __DIR__ . '/../../../views/frontend/' . $view . '.view.php';
        $contents = ob_get_clean();
        $navigation = $this->pagesRepository->fetchForNav();
        
        require __DIR__ . '/../../../views/frontend/layouts/main.view.php';
    }
 
    // 404 에러
    protected function error404() {
        http_response_code(404);
        $this->render('abstract/error404', []);
    }

}