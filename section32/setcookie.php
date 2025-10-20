<?php

// [주의사항] setcookie() 호출 전에 너무 많은 출력이 선행되면 쿠키 세팅이 제대로 작동하지 않을 수 있음

// setcookie()는 내부적으로 HTTP 응답 헤더에 Set-Cookie 값을 추가함
// 하지만 헤더는 출력보다 먼저 전송되어야 하기 때문에
// echo, print, var_dump(), HTML 코드 출력 등으로 인해 출력이 시작되면 더 이상 헤더를 보낼 수 없게 됨
// 이때 setcookie()를 호출하면 아무 효과 없이 무시되거나, PHP가 warning을 출력할 수 있음

// 결론적으로, output buffering을 사용하여 쿠키 세팅 후 출력이 시작되도록 타이밍을 조절하거나 setcookie()가 항상 우선 호출되도록 구조를 조정해야함

// function setcookie(string $name, string $value = "", int $expires_or_options = 0, string $path = "", string $domain = "", bool $secure = false, bool $httponly = false): bool {}
setcookie('user', 'saemi', expires_or_options: time() + 30);

var_dump($_COOKIE);




// expires_or_options 매개변수 미설정시 디폴트값으로 브라우저 닫으면 쿠키 사라짐

// path 매개변수 미설정시 디폴트 값으로 현재 파일 path가 설정됨