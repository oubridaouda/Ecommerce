<?php

namespace Controller\Product;

class ArticleController
{
    public function index()
    {
        echo "juste l'index";
    }

    public function show(int $id)
    {
        echo "je suis la " . $id;
    }
}