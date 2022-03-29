<?php
/* Ici sera effectuer tout le routage du site web */
namespace Router;

class Router{

    public $url;
    public $routes = [];

    //L'$url que l'on recupere avec construct
    public function __construct($url){

        $this->url = trim($url, '/');
    }

    //la function de routage
    public function get(string $path, string $action){
        //Les routes sont stocké dans un tableau
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function run(){
        //bouclage sur les routes
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){
            //verifie si l'url existe
            if($route ->matches($this->url)){
                var_dump($route->matches($this->url));
                $route ->execute($this->url);
            };
        }
        //si non return http not found
        return header ("HTTP/1.0 404 Not Found");
    }
}