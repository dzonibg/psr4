<?php
namespace App\Controllers;

class ErrorHandler {

    public function methodNotFound() {
        echo "Method not found.";
    }

    public function classNotFound() {
        echo "The class not found.";
    }

}