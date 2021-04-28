<?php


use App\Helpers\Greeter;
use App\Http\Request;
use App\Http\Router;
use App\Controllers\TestController;
use App\Http\Director;


require_once '../vendor/autoload.php';
require_once '../App/Helpers/helpers.php';
require_once '../config.php';

$req = new Director();
echo "<br>---<br>";
echo "<br>";
echo $req->controller;
echo "<br>";
echo $req->action;
echo "<br>";
echo $req->parameters;



//$test = new TestController();
//echo $test->index();