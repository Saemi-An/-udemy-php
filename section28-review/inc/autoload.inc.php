<?php
/**
 * @param string $class 라는 문자열을 인자로 받음 (전체 클래스명 eg. App\Controller\PageController)
 * @return void: 반환값은 없음
 */

// spl_autoload_register 함수 호출과 동시에 익명 함수 정의 --> 함수 정의와 동시에 호출됨
spl_autoload_register(function ($class) {

    // 내 프로젝트의 네임스페이스 prefix
    $prefix = 'App\\';

    // 내 프로젝트의 모든 클래스가 모여있는 폴더 위치(= 네임스페이스 prefix 디렉토리)
    $base_dir = __DIR__ . '/../src/';

    // 클래스가 프로젝트의 네임스페이 prefix를 사용하는가?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // 프로젝트 네임스페이스 prefix를 떼고 난 클래스명
    $relative_class = substr($class, $len);


    // src/Controller/PageController.php

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .phps
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});