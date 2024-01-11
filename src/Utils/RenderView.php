<?php

namespace App\Utils;

class RenderView{

    public static function render(string $view, array $args = []){
        extract($args);

        if(file_exists(__DIR__."/../Views/{$view}.php")){
            require_once __DIR__."/../Views/{$view}.php";
        }else{
            throw new \Exception("file {$view} does not exist");
        }
    }
}