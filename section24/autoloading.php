<?php

// 수동으로 모든 파일 항상 로딩하기
// require __DIR__ . '/src/Admin/User.php';
// require __DIR__ . '/src/Admin/Role.php';
// require __DIR__ . '/src/Client/User.php';


// autoload 함수를 통해 필요한 파일만 로딩하지만, 여전히 모든 파일명 써주기
// function autoload($class) {
//     var_dump($class);

//     if ( $class === 'Admin\\User' ) {
//         require __DIR__ . '/src/Admin/User.php';
//         return;
//     }
//     if ( $class === 'Admin\\Role' ) {
//         require __DIR__ . '/src/Admin/Role.php';
//         return;
//     }
//     if ( $class === 'Client\\User' ) {
//         require __DIR__ . '/src/Client/User.php';
//         return;
//     }
// }

// autoload 함수를 통해 필요한 파일만 로딩하면서 파일명 자동완성되도록 하기
// function autoload($class) {
//     $filepath = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';

//     if ( file_exists($filepath) ) {
//         require $filepath;
//     }
// }

// spl_autoload_register('autoload');




spl_autoload_register(function($class) {
    $filepath = __DIR__ . '/src/' . str_replace('\\', '/', $class) . '.php';
    
    if ( file_exists($filepath) ) {
        require $filepath;
    }
});


$admin = new Admin\User();
$client = new Client\User();
