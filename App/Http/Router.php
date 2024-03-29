<?php
namespace App\Http;

use App\Http\Request;

    /*
       Used to find out the parameters to direct the traffic.
       Passed the data to the Director class for directing to the right controller.
    */

class Router {
    public $uri;
    public $method;
    public $routeParameters;
    public $controller;
    public $action;
    public $parameters;

    public function __construct() {
        $request = new Request();
        $this->uri = $this->sanitizeURI($request->uri);
        $this->method = $request->method;

        $this->setRouteParameters();

    }

    private function sanitizeURI($uri) {
        return trim($uri);
    }

    public function setRouteParameters() {
        $this->routeParameters = explode("/", $this->uri);
        $this->setController();
        $this->setAction();
        $this->setParameters();
    }

    public function setController() {
         if (isset($this->routeParameters[1])) {
            $this->controller = $this->routeParameters[1];
        }
    }

    public function setAction() {
        if (isset($this->routeParameters[2])) {
            $this->action = $this->routeParameters[2];
        }
    }

    public function setParameters() {
        if (isset($this->routeParameters[3])) {
            $this->parameters = $this->routeParameters[3];
        }
    }


}