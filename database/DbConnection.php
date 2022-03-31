<?php

namespace Database;

use PDO;

class DbConnection
{

    private $servername;
    private $username;
    private $dbname;
    private $password;
    private $pdo;

    public function __construct(string $dbname, string $servername, string $username, string $password)
    {
        // initialisation des donnée de connexion
        $this->servername = $servername;
        $this->username = $username;
        $this->dbname = $dbname;
        $this->password = $password;
    }

    //La fonction qui nous permet de nous connecter a la bd
    public function getPDO(): PDO
    {
        return $this->pdo ?? $this->pdo = new PDO("mysql:dbname={$this->dbname}; host={$this->servername}",
                $this->username, $this->password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,//afficher une exception en cas d'erreur
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ//transform le tableau associatif en tableau d'objet

                ]);
    }
}