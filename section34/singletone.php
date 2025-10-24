<?php

header('Cotent-Type: text/plain');

// 목적: 전체 앱에서 해당 클래스가 단 한번만 객체를 생성하도록(?) 함
class Container {

    private function __construct() {}

    public static function newInstance() {
        // return new Container();
        return new self();
    }
}

/* XX
$container1 = new Container();
$container2 = new Container();
*/

/*
// private 생성자를 갖고 있기 때문에 에러
$container = new Container();
var_dump($container);
*/


// 클래스의 private 생성자
// 클래스의 public static 함수에서 객체 생성 후 반환
// 글로벌 문맥에서 클래스의 함수를 호출하여 생성된 객체 사용 --> 어느 문맥에서 
$container1 = Container::newInstance();
$container2 = Container::newInstance();

if ( $container1 === $container2 ) {
    var_dump('Same');
} else {
    var_dump('Diff');
}
/*
Diff

new self() 는 매번 새로운 객체(instance) 를 생성함

$container1 과 $container2 는 서로 다른 메모리 주소의 객체임.
*/