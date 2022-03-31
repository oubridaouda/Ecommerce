<?php

namespace Router;

use Database\DbConnection;

class Route
{

    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    /**
     * Permettra de recupere l'url avec ses paramètre
     * get('/posts/:id') par exemple
     **/
    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path); //conversion de l'url avec des expressions regulieres
        $pathToMatch = "#^$path$#i"; //expressions regulieres permettant de s'assurer l'unicité de l'url

        if (preg_match($pathToMatch, $url, $matches)) {
            $this->matches = $matches;
//            var_dump($this->matches);

            return true;
        } else {
            return false;
        }
    }

    public function execute(string $url)
    {
        $params = explode('@', $this->action); //recupere l'action le sépare en controller et methode
        $urlParser = explode('/', $url);
        //Initialisation de notre controller avec la connexion a la bd
        $controller = new $params[0](new DbConnection(DB_NAME, DB_HOST, DB_USER, DB_PWD));
        $method = $params[1];
//      var_dump($urlParser[1]);
        return isset($urlParser[1]) ? $controller->$method($urlParser[1]) : $controller->$method();
    }
}