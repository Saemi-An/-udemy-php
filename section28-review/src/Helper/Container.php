<?php

namespace App\Helper;

class Container {
    private array $instances = [];
    private array $recipes = [];
    
    // \Closure는 PHP에서 익명 함수를 표현하는 내장 클래스 (별도로 use하거나 디렉토리를 만들 필요 없음)
    // bind() 메서드에 들어오는 $recipe가 반드시 익명 함수임을 명시하는 목적으로 사용됨
    public function bind(string $what, \Closure $recipe) {
        $this->recipes[$what] = $recipe;
    }

    public function get($what) {
        if ( empty($this->instances[$what]) ) {
            if ( empty($this->recipes[$what]) ) {
                echo "{$what} 객체 레시피 부재로 프로그램 종료.\n";
                die();
            }

            $this->instances[$what] = $this->recipes[$what]();
        }
        
        return $this->instances[$what];
    }
}