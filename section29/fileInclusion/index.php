<?php
header('ContentType: text/plain');

$val = require __DIR__ . '/other-file.php';

var_dump($val);
