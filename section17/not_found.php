<?php
    echo '<pre>';
    var_dump($_SERVER);
    echo '</pre>';

    echo pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME);

    http_response_code(404);
?><link rel="stylesheet" href="<?php echo pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME) . '/' . 'static/style.css' ;?>">
<h1 class="page_not_found">요청하신 페이지를 찾을 수 없습니다.</h1>