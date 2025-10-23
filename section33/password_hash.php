<?php

header('Content-Type: text/plain');

$pwd = password_hash('saemi123', PASSWORD_DEFAULT);
echo $pwd;

echo "\n\n";

$time = microtime(true);
var_dump(password_verify('saemi1234', $pwd));

echo (microtime(true) - $time);