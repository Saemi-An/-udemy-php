<?php

use Animal as GlobalAnimal;

header('Content-Type: text/plain');

abstract class Animal {
    abstract protected function getWeight(): int;

    public function move() {
        echo "동물이 움직이는 중..\n";
    }
    public function eat() {
        $weight = $this->getWeight();
        echo "동물이 먹는 중.. {$weight}kg\n";
    }
}

class Dog extends Animal {
    protected function getWeight(): int {
        return 18;
    }
}

class Cat extends Animal {
    public function getWeight(): int {
        return 1;
    }
}

$dog = new Dog();
$dog->eat();

$cat = new Cat();
$cat->eat();