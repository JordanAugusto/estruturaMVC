<?php

namespace App\Core;

use App\Http\Request;
use App\Http\Response;

class Core{
    public static function dispatch(array $routes){

        $url = '/';

        isset($_GET['url']) && $url .= $_GET['url'];

        $prefix = "App\\Controllers\\";

        $routerFound = false;
    
        foreach ($routes as $route){
            $pattern = '#^'.preg_replace('/{id}/', '([\w-]+)', $route['path']).'$#';

            if(preg_match($pattern, $url, $params)){
                array_shift($params);

                $routerFound = true;

                [$controller, $method] = explode('@', $route['action']);

                $controller = $prefix . $controller;
                $extendController = new $controller();
                $extendController->$method(new Request, new Response, $params);
            }
        }
        if(!$routerFound){
            $controller = new \App\Controllers\NotFoundController();
            $controller->index(new Request, new Response);
        }
    }
}