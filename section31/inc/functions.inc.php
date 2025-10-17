<?php

function e($val) {
    return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
}

/*
function render($view, $params) {
    extract($params);

    ob_start();
    require __DIR__ . '/../views/frontend/pages/' . $view . '.php';
    $contents = ob_get_clean();

    require __DIR__ . '/../views/frontend/layouts/main.view.php';
}
*/