<?php

namespace App\Admin\Controller;

use App\Admin\Helper\AuthService;

abstract class AbstractAdminController {

    public function __construct(protected AuthService $authService) {}

    // 렌더링
    protected function render($view, $params) {
        extract($params);
        
        ob_start();
        require __DIR__ . '/../../../views/admin/' . $view . '.view.php';
        $contents = ob_get_clean();

        $isLoggedIn = $this->authService->isLoggedIn();
        
        require __DIR__ . '/../../../views/admin/layouts/main.view.php';
    }
 
    // 404 에러
    protected function error404() {
        http_response_code(404);
        $this->render('abstract/error404', []);
    }

}