<?php

class PageModel implements ArrayAccess, Countable {
    public string $title = 'Hello, World!';

    public function offsetExists(mixed $offset): bool {
        return isset($this->$offset);
    }
    public function offsetGet(mixed $offset): mixed {
        return $this->$offset;
    }
    public function offsetSet(mixed $offset, mixed $value): void {
        $this->$offset = $value;
    }
    public function offsetUnset(mixed $offset): void {
        unset($this->$offset);
    }
    public function count(): int {
        // public 프로퍼티의 개수를 반환
        return count(get_object_vars($this));
    }
}

$aboutUs = new PageModel();
// var_dump($aboutUs->title);

// offsetExists
var_dump(isset($aboutUs['title']));

// offsetSet()
$aboutUs['title'] = 'About Us!';

// offsetGet()
var_dump($aboutUs['title']);

// count()
var_dump(count($aboutUs));