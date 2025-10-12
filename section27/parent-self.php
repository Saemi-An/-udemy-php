<?php
header('Content-Type: text/plain');

class Animal {
    public function move() {
        echo "동물이 움직이는 중..\n";
    }
    public function eat() {
        echo "동물이 먹는 중..\n";
        self::move();
    }
}

class Dog extends Animal {
    #[\Override]
    public function move() {
        echo "강아지가 움직이는 중..\n";
        /* // 무한루프
        $this->move();
        */
        parent::move();
    }
}

$dog = new Dog();
// $dog->move();
$dog->eat();