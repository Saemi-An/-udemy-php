<?php

namespace App\Helper;


class CsrfHelper {
    

    public function handle() {
        // 세션 열고
        $this->ensureSession();

        // if ( !empty($_POST) ) {..} --> empty POST 요청은 못 잡아냄
        if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

            // 사용자의 POST 요청에 토큰이 있고 & 내 서버 세션 테이블에 토큰이 있고 & 둘이 같다면
            if ( !empty($_POST['_csrf']) &&
                 !empty($_SESSION['csrfToken']) &&
                 $_POST['_csrf'] === $_SESSION['csrfToken'] ) {

                // 한번 사용된 토큰은 삭제 (이후 새로운 csrf 토큰 발행을 위해)
                unset($_SESSION['csrfToken']);
                return;
            }

            http_response_code(419);
            echo "Error: CSRF 토큰이 일치하지 않습니다";
            die();
        }

    }

    // 세션을 열되 중복으로 열리지 않도록 하는 함수
    private function ensureSession() {
        if ( session_id() === '' ) {
            session_start();
        }
    }

    // 토큰 생성 후 세션에 저장하여 토큰을 리턴하는 함수
    public function generateToken(): string {

        // 세션 테이블에 토큰이 없으면 새로 생성 후 해당 토큰 반환
        if ( empty($_SESSION['csrfToken']) ) {
            $token = bin2hex(random_bytes(16));
            $_SESSION['csrfToken'] = $token;
            return $token;
        }

        // 세션 테이블에 기존 토큰이 있다면 그것 반환
        return $_SESSION['csrfToken'];
    }
}