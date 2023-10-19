<?php
namespace core;

use \src\Config;

class RouterBase 
{
    /**
     * Base function to run router and choose controlle/action
     */
    public function run() 
    {
        $method = Request::getMethod();
        $url    = Request::getUrl();

        //Define default intems
        $controller = Config::ERROR_CONTROLLER;
        $action     = Config::DEFAULT_ACTION;

        $args = [];

        //Verify route exists
        if(isset($this->routes[$method])) 
        {
            foreach($this->routes[$method] as $route => $routeData) 
            {
                $callback = $routeData['trigger'];
                $middleware = $routeData['middleware'];

                //regex to identify arguments and replace
                $pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $route);

                //Match url
                if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1) 
                {
                    array_shift($matches);
                    array_shift($matches);

                    //Catch all arguments to associate
                    $itens = array();
                    if(preg_match_all('(\{[a-z0-9]{1,}\})', $route, $m)) 
                        $itens = preg_replace('(\{|\})', '', $m[0]);

                    //Associate
                    $args = array();
                    foreach($matches as $key => $match) 
                    {
                        $args[$itens[$key]] = $match;
                    }

                    //Execute middlewares if exists or pass if not exists
                    if(!isset($middleware) || empty($middleware) || (!empty($middleware) && $middleware->run()))
                    {
                        //Define controller and action
                        $callbackSplit = explode('@', $callback);
                        $controller = $callbackSplit[0];
    
                        if(isset($callbackSplit[1])) 
                            $action = $callbackSplit[1];
                    }

                    break;
                }
            }
        }

        $controller = "\src\controllers\\$controller";
        $definedController = new $controller();

        $definedController->$action($args);
    }
}