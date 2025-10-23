<?php

namespace App\Admin\Controller;

use App\Admin\Controller\AbstractAdminController;
use App\Admin\Helper\AuthService;


class LoginController extends AbstractAdminController {

    public function logout() {
        $this->authService->logout();
        header('Location: index.php?' . http_build_query(['route' => 'admin/login']));
    }

    public function login() {

        // 이미 로그인된 유저라면 어드민 홈으로 리다이렉션
        $isLoggedIn = $this->authService->isLoggedIn();
        if ( $isLoggedIn ) {
            header('Location: index.php?' . http_build_query(['route' => 'admin/pages']));
            return;
        }

        // 로그인이 안된 사용자라면
        $loginError = false;

        // POST 요청시
        if ( !empty($_POST) ) {
            $username = @(string) ($_POST['username'] ?? '');
            $password = @(string) ($_POST['password'] ?? '');

            // 사용자 제공 인풋값 확인
            if ( !empty($username) && !empty($password) ) {
                
                // 로그인 성공 여부 확인 (데이터베이스 조회)
                $result = $this->authService->handleLogin($username, $password);
                
                // 로그인 성공시 - 어드민 홈으로 리다이렉션
                if ( $result ) {
                    header('Location: index.php?' . http_build_query(['route' => 'admin/pages']));
                    return;
                }
                else {
                    $loginError = true;
                }
            }
            else {
                $loginError = true;
            }
        }

        $this->render('login/login', [
            'loginError' => $loginError,
        ]);
    }

}