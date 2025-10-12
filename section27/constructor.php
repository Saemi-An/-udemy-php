<?php
header('Content-Type: text/plain');

class Animal {
    public function __construct(public int $weight) {}

    public function move() {
        echo "동물이 움직이는 중..\n";
    }
    
    public function eat() {
        echo "동물이 먹는 중.. {$this->weight}Kg\n";
    }
    
}

class Dog extends Animal {
    /*
    public function __construct() {
        // $this->weight = 8;

        // 부모 생성자를 호출하여 값을 넘김
        parent::__construct(10);
    }
    */

    // 자식이 부모 생성자 오버라이드
    // (PHP 8부터) 생성자의 매개변수에 접근 제한자(public, protected, private)를 붙이면 자동으로 클래스 속성(property)이 선언되고 할당
    public function __construct(public string $breed, $weight) {
        echo "새로운 {$breed}(이)가 태어났습니다!\n";
        parent::__construct($weight);
    }

    public function bark() {
        echo "{$this->breed}(이)가 왕! 왕! 짖는 중..\n";
    }
    
    // PHP 8.3부터 Override 표시 안해주면 에러남
    #[\Override]
    public function move() {
        echo "강아지가 움직이는 중..\n";
    }
}

// 부모 클래스의 생성자에 속성이 필요하면 상속하는 자식 클래스에게도 필요
// 부모 클래스의 생성자에 속성이 필요하더라도, 상속하는 자식 클래스의 생성자에 속성이 필요치 않다면 문제 없음
$dog = new Dog('골든 리트리버', 30);
$dog->move();
$dog->bark();
// type이 정해진 속성은 사용되기 전에 초기값 세팅 필수
$dog->eat();