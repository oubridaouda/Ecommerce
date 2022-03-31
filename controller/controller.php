<?php

namespace Controller;

use Database\DbConnection;

abstract class controller
{

    protected $db;

    //Initilisation de l'instance de connexion
    public function __construct(DbConnection $db)
    {
        $this->db = $db;
    }

    protected function view(string $path, array $params = null)
    {

        ob_start();

        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';

        $content = ob_get_clean();
        require VIEWS . 'layout.php';

    }

    protected function getDB()
    {
        return $this->db;
    }
}