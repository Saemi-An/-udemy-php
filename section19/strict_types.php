<?php
declare(strict_types=1);

header('Content-Type: text/plain');

function add_five(int $num): int {
    return $num + 5;
}

$num = (int) ($_GET['num'] ?? 0);
var_dump($num);
var_dump(add_five($num));

function printx3(string $msg): void {
    echo "{$msg}\n";
    echo "{$msg}\n";
    echo "{$msg}\n";
}

printx3((string) $num);