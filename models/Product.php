<?php

namespace Models;

class Product extends Model
{
//nom de table lié au model
    protected $table = 'all_products';

    public function getExcerpt()
    {
        return substr($this->description, 0, 30) . '...';

    }
}