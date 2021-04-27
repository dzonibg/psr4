<?php
namespace App\Http;

class Request {

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = $_SERVER['REQUEST_URI'];
        return $this;
    }

    public $uri;
    public $method;

}