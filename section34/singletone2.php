<?php

header('Cotent-Type: text/plain');

// 목적: 전체 앱에서 해당 클래스가 단 한번만 객체를 생성하도록(?) 함
class Container {

    // 외부 접근 불가
    private function __construct() {}

    // 외부 접근 불가 - 최초 선언시 null값 부여
    private static ?self $instance = null;

    // 항상 동일한 객체를 반환하는 public 함수
    public static function getInstance() {

        // $instance가 null이면 최초로 새로운 객체를 생성하여 할당
        if ( empty(self::$instance) ) {
            self::$instance = new self();
        }

        // $instance에 할당된 항상 동일한(단 하나의) 객체를 반환
        return self::$instance;
    }
}


$container1 = Container::getInstance();
$container2 = Container::getInstance();

if ( $container1 === $container2 ) {
    var_dump('Same');
} else {
    var_dump('Diff');
}


// 컨테이너 사용에 적합
// 하지만 일반적으로 잘 씌이는 방식은 XX