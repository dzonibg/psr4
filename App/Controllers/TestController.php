<?php
namespace App\Controllers;

class TestController {

    public function index() {
        echo "Indexing data";
    }

    public function edit($number) {
        echo $number;
    }

}