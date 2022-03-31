<?php

namespace Models;

use Database\DbConnection;

abstract class Model{

    protected $db;
    protected $table;
    //Initilisation de l'instance de connexion
    public  function __construct(DbConnection $db)
    {
        $this->db = $db;
    }

    //function pour faire une query select sur un model
    public function all(): array
    {
        $query = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY date DESC");
        return $query->fetchAll();
    }

    public function findById($id)
    {
        $query = $this->db->getPDO()->query("SELECT * FROM {$this->table} WHERE product_id = {$id}");
        $query->execute([$id]);
        return $query->fetchAll();
    }
}