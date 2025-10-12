<?php
echo '<pre>';

echo '<h1>Clinet => Server 헤더</h1>';

$ua = $_SERVER['HTTP_USER_AGENT'];
var_dump($ua);

if ( strpos($ua, 'Chrome') !== false ) {
    echo '크롬 사용중';
}
else {
    echo '이외 브라우저 사용중';
}

echo '<h1>Server => Client 헤더</h1>';






echo '</pre>';