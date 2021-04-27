<?php
namespace App\Http;

class Director {

    public $controller;
    public $action;
    public $parameters;

    public function __construct() {
        $router = new Router();
        $this->controller = $router->controller;
        $this->findController(); //TODO

        $this->action = $router->action;
        $this->findAction();

        $this->parameters = $router->parameters;
    }

    public function findController() {
        $this->controller = ucfirst($this->controller) . "Controller";
    }

    public function findAction()
    {
        if (method_exists($this->controller, $this->action)) {
            $this->action = $this->action;
            } else {
            $this->action = "index"; //TODO check if index exists, else throw error
            }
        }
}
