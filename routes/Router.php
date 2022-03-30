<?php
/* Ici sera effectuer tout le routage du site web */

namespace Router;

class Router
{

    public $url;
    public $routes = [];


    public function __construct($url)    //L'$url que l'on recupere avec construct
    {

        $this->url = trim($url, '/');
    }


    public function get(string $path, string $action)    //la function de routage
    {
        $this->routes['GET'][] = new Route($path, $action);//Les routes sont stocké dans un tableau
    }


    public function run()    //Verifie si la route existe et retourne la vue correspondante
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            return header("HTTP/1.0 404 Not Found");
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                $route->execute($this->url);
            }
        }
//        return header("HTTP/1.0 404 Not Found");
    }
}