<?php
namespace App\Http;


class Director
{

    public $controller;
    public $action;
    public $parameters;
    public $errors = false;
    public $router;

    public function __construct()
    {
        $this->router = new Router();

        $this->controller = $this->router->controller;
        $this->findController();

        $this->parameters = $this->router->parameters;

        $this->findAction();



        return $this->direct();
    }

    public function findController()
    {
        if ($this->controller == "") {
            $this->controller = "Index";
        }
        $this->controller = ucfirst($this->controller) . "Controller"; //TODO check if controller exists.
        if
            ((!class_exists('App\\Controllers\\' . $this->controller)) &&
            ($this->controller != "IndexController")) {

            $this->errors = true;
            $this->controller = "ErrorHandler";
            $this->action = "classNotFound";
        }
    }

    public function findParameters() {

    }

    public function findAction()
    {
        $this->action = $this->router->action;

        if ($this->errors == false) {
            $setAction = $this->action;
            if ((method_exists('App\\Controllers\\' . $this->controller, $this->action)) &&
                ($this->action == "")) {
                $this->action = $this->action;
            }
            if ((is_numeric($setAction)) && (method_exists('App\\Controllers\\' . $this->controller, "show"))) {
                $this->action = "show";
                $this->parameters = $setAction;
            } else if (method_exists('App\\Controllers\\' . $this->controller, "index")
                && ($setAction == "")) {
                $this->action = "Index";
            }

            if (!method_exists('App\\Controllers\\' . $this->controller, $this->action)) {
                $this->action = "methodNotFound";
                $this->controller = "ErrorHandler";
            }
        }
    }


    public function direct() {
        $ctrl = 'App\\Controllers\\' . $this->controller;
        $ctrl = new $ctrl;
        call_user_func(array($ctrl, $this->action), $this->parameters);

    }

}
