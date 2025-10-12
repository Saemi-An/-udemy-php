<?php
header('Content-Type: text/plain');

class Animal {
    // protected | 외부에서 접근 불가능한 private에 가깝지만, 상속하는 자식 클래스에서는 사용 가능
    public function __construct(protected int $weight) {}

    public function move() {
        echo "동물이 움직이는 중..\n";
    }
    
    public function eat() {
        echo "동물이 먹는 중.. {$this->weight}Kg\n";
    }
    
}

class Dog extends Animal {

    public function __construct(public string $breed, $weight) {
        echo "새로운 {$breed}(이)가 태어났습니다!\n";
        parent::__construct($weight);
    }

    #[\Override]
    public function move() {
        echo "강아지가 움직이는 중..\n";
    }

    public function bark() {
        echo "{$this->weight}kg의 {$this->breed}(이)가 왕! 왕! 짖는 중..\n";
    }
}

$dog = new Dog('골든 리트리버', 3);
// $dog->move();
// $weight는 부모 클래스의 private property --> 부모 클래스에서는 접근 가능 / 자식 클래스에서는 불가능
var_dump($dog);
$dog->bark();
$dog->eat();