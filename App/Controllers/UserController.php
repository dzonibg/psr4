<?php

namespace App\Controllers;
use App\Models\Users;

class UserController {

    public function index() {
        $users = new Users();
        $data = $users->fetchAll();
        return view("users", compact('data'));
    }

    public function insert() {
        $user = new Users();
        $user->insert("NULL, 'TestName', 'testmail'");
        echo "insert";
    }
}