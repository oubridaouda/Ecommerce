<?php

namespace Controller\User;

use Controller\controller;
use Models\Product;
use Models\User;
use function Sodium\compare;

class ProductContoller extends controller
{

    public function index()
    {
        $products = (new Product($this->getDB()))->all();

        return $this->view('user-pages.index', compact('products'));
    }

    public function findUserProduct(int $id)
    {
        $Userproduct = new User($this->getDB());
        $Userproducts = $Userproduct->findUserProductById($id);
        return $this->view('user-pages.User-products', compact('Userproducts'));

    }

    public function destroy(int $id)
    {
        $product = new User($this->getDB());
        $result = $product->destroy($id);

        if ($result) {
            return header('Location: /your-products/1');
        }

    }

    public function update(int $id)
    {
        $product = (new User($this->getDB()))->findById($id);

        return $this->view('product.AddForm', compare('product'));

    }

}