<?php
header('Content-Type: text/plain');

function fetch_views($id) {

    if ( $id >= 100 ) {
        return false;
    }

    return [
        'id' => $id,
        'title' => 'Title of the news!',
        'content' => 'Content of the news!',
    ];
}

// $a = fetch_views(123);
// var_dump($a);

function f() {
    var_dump('Hello, World!');
    
    return;
}

$val = f();
var_dump($val);

var_dump(isset($val));
var_dump(empty($val));

// var_dump($val_2);

$article = [
    'title' => 'News Title!',
    'content' => null,
];

var_dump($article);
