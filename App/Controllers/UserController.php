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

    public function show($id) {
        $user = new Users();
        $data = $user->findById($id);
        return view("view_user", compact('data'));
    }
}