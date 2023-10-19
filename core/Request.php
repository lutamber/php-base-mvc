<?php
namespace core;

use src\Config;

class Request {

    /**
     * Get request URL
     */
    public static function getUrl() 
    {
        $url = filter_input(INPUT_GET, 'request');
        $url = str_replace(Config::BASE_DIR, '', $url);
        
        return '/'.$url;
    }

    /**
     * Get request method
     */
    public static function getMethod() 
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

}