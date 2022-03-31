<?php

namespace Controller;


use Models\Product;

class ArticleController extends controller
{
    public function index()
    {
        $product = new Product($this->getDB());
        $products = $product->all();

        return $this->view('product.index', compact('products'));
    }

    public function login()
    {
        return $this->view('connexion.Login');

    }

    public function products($id)
    {
        $product = new Product($this->getDB());
        $products = $product->findById($id);
        return $this->view('product.ProductDetail',compact('products'));
    }

    public function addProducts()
    {
        return $this->view('product.AddForm');

    }
    public function ProductsInsert()
    {
        return header('Location: /add-products');

    }

    public function signup()
    {
        return $this->view('connexion.SignUp');

    }

    public function errorPage()
    {
        return $this->view('404-error.index');

    }

    public function users(int $id)
    {
        return $this->view('connexion.Users', compact('id'));

    }
}