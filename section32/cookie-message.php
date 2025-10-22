<?php

// 내가 이 웹사이트를 얼마나 방문 했는가?

// setcookie()는 다음 요청에 반영됨. 
    // $_COOKIET['counter']는 이전 요청에서 브라우저가 보낸 값을 읽어오고
    // setcookie('counter', $counter+=1);는 브라우저에게 "다음부터 counter=1을 보내라"는 응답 헤더를 전송함
    // 따라서 $_COOKIET['counter']값은 개발자도구에서 확인한 쿠키보다 항상 1씩 더 작음



if ( !empty($_GET['cookie_allowed']) ) {
    setcookie('cookie_allowed', 1);
    header('Location: cookie-message.php');
    die();
}


if ( !empty($_COOKIE['cookie_allowed']) ) {

    $counter = @(int) ($_COOKIE['counter'] ?? 0);
    
    setcookie('counter', $counter+=1);
    
    var_dump($counter);
    
    var_dump($_COOKIE['counter']);

}
else {
    echo "<p>쿠키 사용을 허용하시겠습니까?: <a href='cookie-message.php?cookie_allowed=yes'>예</a></p>";
}