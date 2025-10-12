<?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

function render($view, $params) {
    // foreach ( $params AS $key => $val ) {
    //     ${$key} = $val;
    // }

    extract($params);

    ob_start();
    require __DIR__ . '/' . 'views/pages/' . $view;
    $contents = ob_get_clean();

    require __DIR__ . '/' . 'views/layouts/main.view.php';
}





$name = 'Saemi';

render("index.view.php", [
    'name' => $name,
    'sum' => 123,
]);