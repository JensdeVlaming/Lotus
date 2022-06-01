<?php

class Route
{
    // protected $currentController = "view";
    // protected $currentMethod = "index";
    // protected $params = [];

    public static function get($route, $function)
    {
        //get method, don't continue if method is not the 
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method !== 'GET') {
            return;
        }

        //check the structure of the url
        $struct = self::checkStructure($route, $_SERVER['REQUEST_URI']);

        //if the requested url matches the one from the route
        //get the url params and run the callback passing the params
        if ($struct) {
            $params = self::getParams($route, $_SERVER['REQUEST_URI']);

            $controller = $function[0];
            $method = $function[1];

            $controller = new $controller;
            $controller->$method($params);

            //prevent checking all other routes
            die();
        }
    }

    public static function post($route, $function)
    {
        //get method, don't continue if method is not the 
        $method = $_SERVER['REQUEST_METHOD'];
        if ($method !== 'POST') {
            return;
        }

        //check the structure of the url
        $struct = self::checkStructure($route, $_SERVER['REQUEST_URI']);

        //if the requested url matches the one from the route
        //get the url params and run the callback passing the params
        if ($struct) {
            $controller = $function[0];
            $method = $function[1];

            $controller = new $controller;
            $controller->$method($_POST);

            // $params = self::getPayload($_POST);
            // $function->__invoke($_POST);

            //prevent checking all other routes
            die();
        }
    }
    public static function auth() {
        
    }
    private static function urlToArray($url1, $url2)
    {
        //convert route and requested url to an array
        //remove empty values caused by slashes
        //and refresh the indexes of the array
        $a = array_values(array_filter(explode('/', $url1), function ($val) {
            return $val !== '';
        }));
        $b = array_values(array_filter(explode('/', $url2), function ($val) {
            return $val !== '';
        }));

        //debug mode for development
        // if(true) array_shift($b);
        return array($a, $b);
    }

    private static function checkStructure($url1, $url2)
    {
        //remove query parameters for structure check        
        $url2 = explode("?", $url2)[0];

        list($a, $b) = self::urlToArray($url1, $url2);

        //if the sizes of the arrays don't match, their structures don't match either
        if (sizeof($a) !== sizeof($b)) {
            return false;
        }

        //for each value from the route
        foreach ($a as $key => $value) {

            //if the static values from the url don't match
            // or the dynamic values start with a '?' character
            //their structures don't match
            if ($value[0] !== ':' && $value !== $b[$key] || $value[0] === ':' && $b[$key][0] === '?') {
                return false;
            }
        }

        //else, their structures match
        return true;
    }

    private static function getParams($url1, $url2)
    {
        list($a, $b) = self::urlToArray($url1, $url2);

        $params = array('params' => array(), 'query' => array());

        //foreach value from the route
        foreach ($a as $key => $value) {
            //if it's a dynamic value
            if ($value[0] == ':') {
                //get the value from the requested url and throw away the query string (if any)
                $param = explode('?', $b[$key])[0];
                $value = explode('?', $value)[0];
                $value = str_replace(':', '', $value);
                $params['params'][$value] = $param;
            }
        }

        //get the last item from the request url and parse the query string from it (if any)
        $queryString = explode('?', end($b));
        if (isset($queryString[1])) {
            parse_str($queryString[1], $params['query']);
        }

        return $params;
    }

    // public static function getPayload($payload){
    //     $params = array('payload' => $payload);

    //     return $payload;
    // }

    // public function __construct() {
    //     $url = $this->getUrl();

    //     if (file_exists("../app/controllers/" . $url[0] . ".controller.php")) {
    //         $this->currentController = $url[0];
    //         unset($url[0]);
    //     }

    //     require_once("../app/controllers/" . $this->currentController . ".controller.php");

    //     $controller = $this->currentController . "Controller";
    //     $this->currentController = new $controller;

    //     $param = 0;
    //     if ($controller == "viewController") {
    //         // Check for second part of URL
    //         if (isset($url[$param])) {
    //             if (method_exists($controller, $url[$param])) {
    //                 $this->currentMethod = $url[$param];
    //                 unset($url[$param]);
    //             }
    //         }
    //     } else {
    //         $param = sizeof($url);
    //         // Check for second part of URL
    //         if (isset($url[$param])) {
    //             if (method_exists($controller, $url[$param])) {
    //                 $this->currentMethod = $url[$param];
    //                 unset($url[$param]);
    //             }
    //         }
    //     }

    //     // Get parameters
    //     $this->params = $url ? array_values($url) : [];

    //     call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    // }

    // public function getUrl() {
    //     if (isset($_GET["url"])) {
    //         $url = rtrim($_GET["url"], "/");

    //         // Allows you to filter variables as string/number
    //         $url = filter_var($url, FILTER_SANITIZE_URL);

    //         // Breaking it into an array
    //         $url = explode("/", $url);

    //         return $url;
    //     }
    // }
}
