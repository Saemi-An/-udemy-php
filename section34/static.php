<?php

header('Content-Type: text/plain');

class Car {
 
    public static $brand = 'Hyndai';

    public static function drive() {
        // var_dump($this);

        $brand = self::$brand;
        var_dump("$brand 자동차 주행중..");
        // 참고) 변수 바로 뒤에 문자열이 올 때에는 {}가 필수지만, 그렇지 않을 경우에는 그냥 사용 가능 --> 언제 코드가 변할지 모르니 그냥 항상 사용해주는 것이 좋음
    }

}

/*
// 개별 객체에 함수가 종속되어 있음
$car = new Car();
$car->drive();
*/

/*
$car = new Car();
var_dump($car->brand);
*/


// static 함수를 호출하는 방법
    // 클래스로 찍어낸 객체에 함수가 붙어있는게 아니라
    // 클래스 자체에 함수가 붙어있음
// static 키워드는 클래스 자체에 속성 혹은 함수가 종속되도록 함. 따라서 객체 생성 없이도 사용 가능!

Car::drive();
var_dump(Car::$brand);

// static property, function은 클래스 자체에 붙어있기 때문에, 그 값이 바뀌면 전체 코드에서 값이 바뀜. 따라서 값 변경에 유의 필요!
    // 자주 사용되지 않음 (항상 고정된 값이 아닌 이상)