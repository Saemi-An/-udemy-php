<?php

// use Excpetion;

class UserNotAdminException extends Exception {}
class TitleTooShortException extends Exception {}

function edit_page($user, $title) {
    if ( $user !== 'admin' ) {

        // Exception은 PHP에서 제공하는 클래스
        // 내가 특정 namespace 사용중이라면 "\PHP클래스명"을 사용하여 글로벌 네임스페이스임을 표현해줘야함

        throw new UserNotAdminException('어드민 사용자가 아닙니다.');
    }
    if ( strlen($title) < 3 ) {

        throw new TitleTooShortException('제목 길이가 너무 짧다.');
    }

    // Edit or Update Process
}

try {
    $file = fopen(__DIR__ . '/test.text', 'r');
    edit_page('admin', 'a');
    echo "----\n";

}
catch ( UserNotAdminException $e ) {
    // var_dump($e);
    // var_dump($e->getMessage());
    echo "어드민 유저가 아님\n";
}
catch ( TitleTooShortException $e ) {
    
    // echo "제목이 너무 짧음\n";
}
// 항상 실행되는 블록
finally {
    if ( !empty($file) ) fclose($file);
}