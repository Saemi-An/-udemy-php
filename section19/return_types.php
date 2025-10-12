<?php
header('Content-Type: text/plain');

function add_five(int $num): int|float {
    return $num + 5;
}

$result = add_five(5);
var_dump($result + 5);