<?php
/* Ici sera effectuer tout le routage du site web */

namespace Router;

use Exceptions\NotFound;

class Router
{

    public $url;
    public $routes = [];
    public $check;


    public function __construct($url)    //L'$url que l'on recupere avec construct
    {

        $this->url = trim($url, '/');
    }

    //Methode get pour passer nos params en url
    public function get(string $path, string $action)    //la function de routage
    {
        $this->routes['GET'][] = new Route($path, $action);//Les routes sont stocké dans un tableau
    }

    //Methode post pour nos formulaire
    public function post(string $path, string $action)    //la function de routage
    {
        $this->routes['POST'][] = new Route($path, $action);//Les routes sont stocké dans un tableau
    }


    public function run()    //Verifie si la route existe et retourne la vue correspondante
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            return header("HTTP/1.0 404 Not Found");
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->matches($this->url)) {
                $route->execute($this->url);
                $this->check = true;
            }
        }

        if ($this->check == NULL) {
            throw new NotFound('La page est introuvable');
        }
//        return header("HTTP/1.0 404 Not Found");
    }
}