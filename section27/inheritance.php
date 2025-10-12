<?php
header('Content-Type: text/plain');

class Animal {
    public function move() {
        echo "동물이 움직이는 중..\n";
    }
    
    public function eat() {
        echo "동물이 먹는 중..\n";
    }
    
}

class Dog extends Animal {
    public function bark() {
        echo "강아지가 왕! 왕! 짖는 중..\n";
    }
    
    // PHP 8.3부터 Override 표시 안해주면 에러남
    #[\Override]
    public function move() {
        echo "강아지가 움직이는 중..\n";
    }
}

$animal = new Animal();
$animal->eat();

// 자식 클래스는 부모 클래스의 property와 function을 그대로 사용할 수 있음
$dog = new Dog();
$dog->eat();

// object 타입은 다름
var_dump($animal);
var_dump($dog);

// 부모 클래스는 자식 클래스의 함수를 사용할 수 없음
$dog->bark();
// $animal->bark();

// 자식 클래스는 부모 클래스를 override 할 수 있음
$dog->move();