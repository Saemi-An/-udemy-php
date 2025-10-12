<?php

namespace App\Client;

use PDO;
use App\Admin\User as AdminUSer;

class User {

    public function __construct() {
        // $pdo = new \PDO();
        // $pdo = new PDO();

        // $adminUser = new \Admin\User();
        $adminUser = new AdminUser();

    }

}