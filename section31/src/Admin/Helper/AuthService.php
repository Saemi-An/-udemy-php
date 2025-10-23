<?php

namespace App\Admin\Helper;

use Dom\Entity;
use PDO;

class AuthService {

    // Repository를 거치기에는 코드가 작아 그냥 이곳에서 바로 DB 커넥션까지 함
    // (실제 프로젝트에서는 UserRepository를 거쳐서 작성될 코드)

    public function __construct(private PDO $pdo) {}

    // 세션을 열되, 중복으로 열리지 않도록 하는 함수
    private function ensureSession() {
        // 세션 아이디 없으면 세션 시작
        if ( session_id() === '' ) {
            session_start();
        }
    }

    public function handleLogin(string $username, string $password): bool {
        
        // [예외 처리] 인자값이 없는 경우
        if ( empty($username) ) return false;
        if ( empty($password) ) return false;

        // DB 연결 - 아이디를 기반으로 사용자 존재 여부 확인
        $stmt = $this->pdo->prepare(
            "SELECT * FROM `users`
             WHERE `username` = :username"
        );
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        // [예외 처리] 찾는 사용자가 없는 경우
        if ( empty($entry) ) {
            return false;
        }

        // 사용자 제공 비번과 DB에서 확인한 해싱된 비번 일치 여부 확인
        $hash = $entry['password'];
        $passwordCheck = password_verify($password, $hash);   // 인자값; 유저 제공 비번, DB에 저장된 해시 비번

        // 불일치
        if ( empty($passwordCheck) ) {
            return false;
        }
        
        // 일치 - 세션에 저장
        $this->ensureSession();
        $_SESSION['adminUserId'] = $entry['id'];
        // 로그인 및 세션 저장과 동시에 세션 아이디 변경
        session_regenerate_id();
        
        // 쿠키에 저장 - 어드민 유저 id값 노출 + 쿠키 조작 가능
        // setcookie('adminUserId', $entry['id']);

        return true;
        
    }

    public function isLoggedIn(): bool {
        $this->ensureSession();

        // 세션에 'adminUserId' 키값이 있으면 true / 없으면 false
        return !empty($_SESSION['adminUserId']);
    }

    // 로그인된 유저가 아니라면 로그인 페이지로 이동시키는 함수
    public function ensureLoggedIn() {
        
        // 현재 유저가 로그인된 상태인지 우선 확인
        $isLoggedIn = $this->isLoggedIn();

        // 로그인된 상태가 아니라면 로그인 페이지로 리다이렉션
        if ( empty($isLoggedIn) ) {
            header('Location: index.php?' . http_build_query(['route' => 'admin/login']));
            return;
        }

    }

    public function logout() {
        // 세션 시작
        $this->ensureSession();

        // 기존 로그인 세션 삭제
        unset($_SESSION['adminUserId']);

        // 세션 아이디 변경
        session_regenerate_id();
    }

}