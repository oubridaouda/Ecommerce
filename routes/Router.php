<?php
/* Ici sera effectuer tout le routage du site web */
namespace Router;

class Router{

    public $url;
    public $routes = [];

    //L'$url que l'on recupere avec construct
    public function __construct($url){

        $this->url = $url;
    }

    public function show(){
        echo $this->url;
    }

    public function get(string $path, string $action){
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function run(){
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){

            if($route ->matches($this->url)){
                $route ->execute();
            };
        }

        return header('HTTP/1.0 404 Not Found');
    }
}