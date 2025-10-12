<?php

declare(strict_types=1);

namespace App\Weather;

class WeatherInfo {

    public function __construct(
        public string $city,
        public int $tmpK,
        public string $weatherType
    ) {}

    public function getFahrenheit() {
        return round(($this->tmpK - 273.15) * (9 / 5) + 32);
    }

    public function getCelsius() {
        return round(($this->tmpK - 273.15));
    }

}