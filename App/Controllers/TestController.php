<?php
namespace App\Controllers;

class TestController {

    public function index() {
        echo "Indexing data";
    }

    public function test($number) {
        echo $number;
    }

}