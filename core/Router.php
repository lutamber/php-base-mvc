<?php

namespace core;

use \core\RouterBase;

class Router extends RouterBase 
{
    public $routes;

    /**
     * Define GET method Route
     */
    public function get($endpoint, $trigger, $middleware = null) 
    {
        $this->routes['get'][$endpoint] = array(
            "middleware" => $middleware,
            "trigger" => $trigger
        );
    }

    /**
     * Define POST method Route
     */
    public function post($endpoint, $trigger, $middleware = null) 
    {
        $this->routes['post'][$endpoint] = array(
            "middleware" => $middleware,
            "trigger" => $trigger
        );
    }

    /**
     * Define PUT method Route
     */
    public function put($endpoint, $trigger, $middleware = null) 
    {
        $this->routes['put'][$endpoint] = array(
            "middleware" => $middleware,
            "trigger" => $trigger
        );
    }

    /**
     * Define DELETE method Route
     */
    public function delete($endpoint, $trigger, $middleware = null) 
    {
        $this->routes['delete'][$endpoint] = array(
            "middleware" => $middleware,
            "trigger" => $trigger
        );
    }

}