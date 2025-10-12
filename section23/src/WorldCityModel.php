<?php

class WorldCityModel {
    public function __construct(
        public int $id,

        public string $city,
        public string $country,
        public int $population,
        public string $capital,

        public string $iso2,
        public string $iso3,

        public float $lat,
        public float $lng,

        public string $cityAscii,
        public string $adminName,
    ) {}

    // 도시 + 국가 포메팅 함수, eg) Seoul (South Korea)
    public function getCityWithCountry(): string {
        return "{$this->getFlag()} {$this->city} ($this->country)";
    }

    // 인구수 포메팅 함수, 23,016,000명
    public function getFormattedPopulation(): string {
        return (string) number_format($this->population) . '명';
    }

    // 국기 이모티콘 출력 함수
    public function getFlag():string {
        return get_flag_of_contry($this->iso2);
    }

}