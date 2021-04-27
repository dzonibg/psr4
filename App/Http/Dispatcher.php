<?php
namespace App\Http;
use App\Http\Director;

class Dispatcher {
    public function __construct()
    {
        $director = new Director();
        $action = $director->action;
        echo $action;
        $director->$action;
    }
}