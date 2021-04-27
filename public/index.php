<?php


use App\Helpers\Greeter;
use App\Http\Request;
use App\Http\Router;

require_once '../vendor/autoload.php';

$req = new Router();
echo $req->uri;
echo "<br>";
echo $req->controller;
echo $req->action;
echo $req->parameters;