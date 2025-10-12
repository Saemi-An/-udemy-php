<?php
// header('Content-Type: text/plain');

// $msg = 'The hotel costs $ 250.00, and the flight is € 150.00. And this number is just annoying: 123.00';
// $result = null;
// var_dump(preg_match('/([$€]) ([0-9]+\.[0-9]{2})/u', $msg, $result));
// var_dump($result);

$msg = 'The hotel costs $ 250.00, and the flight is € 150.00. And this number is just annoying: 123.00';
// var_dump(preg_replace('/([$€]) ([0-9]+\.[0-9]{2})/u', '---', $msg));
// var_dump(preg_replace('/([$€]) ([0-9]+\.[0-9]{2})/u', '<u>$0</u>', $msg));
var_dump(preg_replace('/([$€]) ([0-9]+\.[0-9]{2})/u', '$1 ---', $msg));