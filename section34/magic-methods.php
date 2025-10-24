<?php

class PageModel {

    public array $attributes = [];

    public function __construct() {
        $this->attributes = [
            'id' => 5,
            'title' => 'Hello, World!',
        ];
    }

    public function __get($key) {

        if ( isset($this->attributes[$key]) ) {
            return $this->attributes[$key];
        }

        return null;
    }

    public function __set($key, $val) {
        $this->attributes[$key] = $val;
    }

    public function __isset($key) {
        return isset($this->attributes[$key]);
    }

    public function __unset($key) {

        if ( $this->__isset($key) ) {
            unset($this->attributes[$key]);
        }

    }

}

$aboutUs = new PageModel();
// var_dump($aboutUs->slug);

$aboutUs->content = 'This is a content';

var_dump(isset($aboutUs->content));

unset($aboutUs->content);

var_dump($aboutUs->attributes);