<?php

namespace Models;

use Database\DbConnection;
use PDO;

abstract class Model
{

    protected $db;
    protected $table;

    //Initilisation de l'instance de connexion
    public function __construct(DbConnection $db)
    {
        $this->db = $db;
    }

    //function pour faire une query select sur un model
    public function all(): array
    {
        $query = $this->db->getPDO()->query("SELECT * FROM {$this->table} ORDER BY publishdate DESC");
        $query->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        return $query->fetchAll();
    }

    //Methode pour recuperer des produits par leurs id
    public function findById($id): Model
    {
        $query = $this->db->getPDO()->query("SELECT * FROM {$this->table} WHERE product_id = {$id}");
        $query->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $query->execute([$id]);
        return $query->fetch();
    }

    //Methode pour recuperer les produits d'un utilisateur par leurs id
    public function findUserProductById($id): array
    {
        $query = $this->db->getPDO()->query("SELECT * FROM all_products p INNER JOIN {$this->table} u  ON u.id = p.id_of_user WHERE id = {$id}");
        $query->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $query->execute([$id]);
        return $query->fetchAll();
    }

    public function create(array $data)
    {

        $firstParenthesis = "";
        $secondParenthesis = "";
        $i = 1;

        //conttruction de la réquète avec la boucle en recuperant les $data par post
        foreach ($data as $key => $value) {
            $comma = $i == count($data) ? "" : ",";
            //initialiser toute les proprieter avec leur donnée correspondant
            $firstParenthesis .= "{$key}{$comma}";
            $secondParenthesis .= "{$key} = :{$key}{$comma}";
            $i++;
        }

//        echo '<pre>';
//        print_r("INSERT INTO {$this->table} ($firstParenthesis, id_of_user) VALUES ('".$data['title_product']."','".$data['price']."','".$data['image']."','".$_SESSION['auth']."')"); die();
//        echo '</pre>';

        //Requete d'insertion d'un produit
        return $this->query("INSERT INTO {$this->table} ($firstParenthesis, id_of_user) VALUES ('" . $data['title_product'] . "','" . $data['price'] . "','" . $data['description'] . "','" . $data['image'] . "','" . $_SESSION['auth'] . "')", $data);

    }

    //Methode de mis à jours de produit
    public function update(int $id, array $data)
    {
        $sqlRequestPart = "";
        $i = 1;

        //conttruction de la réquète avec la boucle en recuperant les $data par post
        foreach ($data as $key => $value) {
            $comma = $i == count($data) ? " " : ", ";
            //initialiser toute les proprieter avec leur donnée correspondant
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['product_id'] = $id;

        return $this->query("UPDATE ($this->table) SET {$sqlRequestPart} WHERE product_id = :product_id", $data);
    }

    //Methode de suppression de produit
    public function destroy($id): bool
    {
        return $this->query("DELETE FROM all_products WHERE product_id = ?", [$id]);

    }

    //Methode query pour executer les requete sql
    public function query(string $sql, array $param = null, bool $single = null)
    {

        if (strpos($sql, 'DELETE') == 0 || strpos($sql, 'UPDATE') == 0 || strpos($sql, 'CREATE') == 0) {
            $method = is_null($param) ? 'query' : 'prepare';

            $query = $this->db->getPDO()->$method($sql);
            $query->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $query->execute($param);
        }
    }
}