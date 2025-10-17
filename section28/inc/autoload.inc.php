<?php
/**
 * An example of a project-specific implementation.
 *
 * After registering this autoload function with SPL, the following line
 * would cause the function to attempt to load the \Foo\Bar\Baz\Qux class
 * from /path/to/project/src/Baz/Qux.php:
 *
 *      new \Foo\Bar\Baz\Qux;
 *
 * @param string $class The fully-qualified class name.
 * @return void
 */

// spl_autoload_register 함수 호출과 동시에 익명 함수 정의 --> 함수 정의와 동시에 호출됨
spl_autoload_register(function ($class) {

    // src 폴더가 App\
    // 내 프로젝트의 네임스페이스 prefix
    // project-specific namespace prefix
    $prefix = 'App\\';

    // 내 프로젝트의 모든 클래스가 모여있는 폴더 위치(= 네임스페이스 prefix 디렉토리)
    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/../src/';

    // 클래스가 프로젝트의 네임스페이 prefix를 사용하는가?
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // 프로젝트 네임스페이스 prefix를 떼고 난 클래스명
    // get the relative class name
    $relative_class = substr($class, $len);

    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});