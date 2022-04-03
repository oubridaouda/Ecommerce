<?php

namespace Models;

class User extends Model
{
//nom de table lié au model
    protected $table = 'users';

    public function getByUsername(string $username)
    {

        $query = $this->db->getPDO()->query("SELECT * FROM {$this->table} WHERE  username = '" . $username . "'");
        $query->setFetchMode(\PDO::FETCH_CLASS, get_class($this), [$this->db]);
        $query->execute([$username]);
        return $query->fetch();

    }
}