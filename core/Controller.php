<?php
namespace core;

use \src\Config;

class Controller 
{
    /**
     * Redirect to other page inside controller
     */
    protected function redirect($url) 
    {
        header("Location: ".$this->getBaseUrl().$url);
        exit;
    }

    /**
     * Get base URL
     */
    private function getBaseUrl() 
    {
        $base = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';

        $base .= $_SERVER['SERVER_NAME'];

        if($_SERVER['SERVER_PORT'] != '80') 
            $base .= ':'.$_SERVER['SERVER_PORT'];
            
        $base .= Config::BASE_DIR;
        
        return $base;
    }

    /**
     * Render view or partial components
     */
    private function _render($folder, $viewName, $viewData = []) 
    {
        if(file_exists('../src/views/'.$folder.'/'.$viewName.'.php')) 
        {
            extract($viewData);

            /**
             * Variable $render contains a reder function for use
             * inside View element
             */
            $render = function($vN, $vD = []) { $this->renderPartial($vN, $vD); };

            require '../src/views/'.$folder.'/'.$viewName.'.php';
        }
    }

    /**
     * Render a partial component
     */
    private function renderPartial($viewName, $viewData = []) 
    {
        $this->_render('partials', $viewName, $viewData);
    }

    /**
     * Render view
     */
    public function render($viewName, $viewData = []) 
    {
        $this->_render('pages', $viewName, $viewData);
    }

}