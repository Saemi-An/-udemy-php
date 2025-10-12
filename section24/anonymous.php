<?php

// 함수에 이름을 붙이지 않고
// 변수에 바로 할당하여 변수를 통해 함수를 호출할 수 있음
// 단, 변수이기 때문에 세미콜론 필수
$print = function() {
    var_dump('Hello, World!');
};

$print();