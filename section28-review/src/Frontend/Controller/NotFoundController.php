<?php
// 이 파일 안의 클래스(또는 함수)는 App\Frontend\Controller라는 네임스페이스에 속함 (상대 경로)
namespace App\Frontend\Controller;

class NotFoundController extends AbstractController {

     public function error404() {
        
        // protected 였던 부모의 함수를 public으로 호출
        return parent::error404();
    }

}