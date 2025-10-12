<?php

declare(strict_types=1);

namespace App\Weather;

interface WeatherFetcherInterface {

    public function fetch(string $city): ?WeatherInfo;
}