<?php

namespace App\Admin;

class User {

    // 같은 namespace 안에 있는 클래스들은 서로간의 접근 및 사용이 용이함
    public Role $role;
    // public \Admin\Role $role;

    public function __construct()
    {
        $this->role = new Role();
    }
}