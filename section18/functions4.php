<?php

header('Content-Type: text/plain');

$size = filesize(__DIR__ . '/' . 'chowon.jpeg');

var_dump($size);

function format_filesize($size) {
    // bytes
    if ( $size < 1024 ) {
        $size = round($size, 2);
        return "{$size} bytes";
    }
    // KB
    $size = $size / 1024;
    if ( $size < 1024 ) {
        $size = round($size, 2);
        return "{$size} KB";
    }
    // MB
    $size = $size / 1024;
    if ( $size < 1024 ) {
        $size = round($size, 2);
        return "{$size} MB";
    }
}

var_dump(format_filesize(15));
var_dump(format_filesize(1500));
var_dump(format_filesize(2000000));
var_dump(format_filesize($size));