<?php
header('Content-Type: text/plain');

function add_five(float|int $num) {
    return $num + 5;
}
// $id = $_GET['num'] ?? 0;
// add_five($id);

var_dump(add_five(3.14));
var_dump(add_five(5));

function f(array|bool|string $a) {
    var_dump($a);
}

f([]);
f(true);
f(123);