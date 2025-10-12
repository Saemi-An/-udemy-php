<?php
header('Content-Type: text/plain');

ob_start();
echo 'Hello, World!';
// ob_clean();
// ob_flush();
$contents = ob_get_clean();

var_dump($contents);