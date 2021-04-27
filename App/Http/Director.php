<?php
namespace App\Http;


class Director
{

    public $controller;
    public $action;
    public $parameters;

    public function __construct()
    {
        $router = new Router();
        $this->controller = $router->controller;
        $this->findController(); //TODO

        $this->action = $router->action;
        $this->findAction();

        $this->parameters = $router->parameters;
        $this->findParameters();

        $this->direct();
    }

    public function findController()
    {
        $this->controller = ucfirst($this->controller) . "Controller"; //TODO check if controller exists.
    }

    public function findAction()
    {
        $exists = 0;
        if (method_exists('App\\Controllers\\' . $this->controller, $this->action)) {
            $this->action = $this->action;
            $exists = 1;
        }

        if (($this->action == '') && (method_exists('App\\Controllers\\' . $this->controller,
                'index'))) {
            $this->action = "index";
        } else if (!method_exists('App\\Controllers\\' . $this->controller, $this->action)) {
            $this->action = "show";
        }
    }

    public function findParameters() {
        if (!isset($this->parameters)) {
            return 0;
        } else {
            $this->parameters = $this->parameters;
        }
    }

    public function direct() {
        $ctrl = 'App\\Controllers\\' . $this->controller;
        $ctrl = new $ctrl;
        call_user_func(array($ctrl, $this->action), $this->parameters);

    }

}
