<?php

class App {
    
     public function __construct() {
         //導向controller
        $url = $this->parseUrl();
        $controllerName = "{$url[0]}Controller";
        
        //建controller物件
        require_once "controllers/$controllerName.php";
        $controller = new $controllerName;
        
        //導向methodName
        $methodName = $url[1];
        unset($url[0]); unset($url[1]);
        $params = $url ? array_values($url) : Array();
        call_user_func_array(Array($controller, $methodName), $params);
    }
    
    public function parseUrl() {
        // 抓取URL以"/"區分字串
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/");
            $url = explode("/", $url);
            return $url;
        }
    }
    
}

?>