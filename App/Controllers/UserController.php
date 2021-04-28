<?php

namespace App\Controllers;
use App\Models\Users;

class UserController {

    public function index() {
        $users = new Users();
        var_dump($users->fetchAll());
    }

    public function insert() {
        $user = new Users();
        $user->insert("NULL, 'TestName', 'testmail'");
        echo "insert";
    }
}