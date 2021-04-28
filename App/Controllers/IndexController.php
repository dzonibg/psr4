<?php
namespace App\Controllers;

class IndexController {

    public function index() {
        return view("index");
    }

    public function show($id) {
        return view("index", compact('id'));
    }
}