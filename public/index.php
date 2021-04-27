<?php


use App\Helpers\Greeter;
use App\Http\Request;
use App\Http\Router;

require_once '../vendor/autoload.php';

$req = new \App\Http\Director();
echo "<br>";
echo $req->controller;
echo $req->action;
echo $req->parameters;