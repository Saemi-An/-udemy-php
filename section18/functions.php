<?php
header('Content-Type: text/plain');

function f($str, $cnt = 3) {

    for ( $i=0; $i<$cnt; $i++ ) {
        echo "{$str}\n";
    }

}
// ====================================================================================

function add_five($num) {
    return $num + 5;
}

$result = add_five(5) + 5;

var_dump($result);


var_dump(add_five(add_five(5)));

function fetch_views($id) {
    return [
        'id' => $id,
        'title' => 'Title of the news!',
        'content' => 'Content of the news!',
    ];
}

$a = fetch_views(1);
var_dump($a['title']);