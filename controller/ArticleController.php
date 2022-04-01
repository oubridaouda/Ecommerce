<?php

namespace Controller;


use Models\Product;
use Models\User;

class ArticleController extends controller
{
    public function index()
    {
        $product = new Product($this->getDB());
        $products = $product->all();

        return $this->view('product.index', compact('products'));
    }

    public function products($id)
    {
        $product = new Product($this->getDB());
        $products = $product->findById($id);
        return $this->view('product.ProductDetail', compact('products'));
    }

    public function ProductsInsert()
    {
        return header('Location: /add-products');

    }

    public function users(int $id)
    {
        return $this->view('connexion.Users', compact('id'));

    }
}