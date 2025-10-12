<?php
use Admin\User;
use Client\User as Client;

// class Cliet_User {}
// class Admin_User {}

require __DIR__ . '/src/Admin/User.php';
require __DIR__ . '/src/Admin/Role.php';
require __DIR__ . '/src/Client/User.php';


var_dump("Admin\\User");
var_dump(User::class);


$admin = new User();
// var_dump($admin);
var_dump($admin::class);

// $client = new Client\User();
$client = new Client();
var_dump($client);

var_dump(Client::class);

var_dump($client instanceof Client);
var_dump($client instanceof \Client\User);
var_dump($client instanceof User);