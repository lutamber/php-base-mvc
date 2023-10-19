<?php

namespace core;

use \core\RouterBase;

class Router extends RouterBase 
{
    public $routes;

    /**
     * Define GET method Route
     */
    public function get($endpoint, $trigger) 
    {
        $this->routes['get'][$endpoint] = $trigger;
    }

    /**
     * Define POST method Route
     */
    public function post($endpoint, $trigger) 
    {
        $this->routes['post'][$endpoint] = $trigger;
    }

    /**
     * Define PUT method Route
     */
    public function put($endpoint, $trigger) 
    {
        $this->routes['put'][$endpoint] = $trigger;
    }

    /**
     * Define DELETE method Route
     */
    public function delete($endpoint, $trigger) 
    {
        $this->routes['delete'][$endpoint] = $trigger;
    }

}