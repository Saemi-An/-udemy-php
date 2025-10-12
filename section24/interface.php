<?php

header('Content-Type: text/plain');

interface Car {
    public function drive(): string;
}

class FuelCar implements Car {
    public function drive(): string {
        return "운전중.. 휘발유 소비중..\n";
    }
}

class ElectricCar implements Car {
    public function drive(): string {
        return "전기차 운전중.. 전기 소비중..\n";
    }
}


function transport(Car $car) {
    $car->drive();
}

$audi = new FuelCar();
transport($audi);

$tesla = new ElectricCar();
transport($tesla);

// transport('hi');