<?php

namespace Controller\User;

use Controller\controller;
use Models\Product;
use Models\User;

class ProductContoller extends controller
{

    public function index()
    {
        $this->isUser();
        $products = (new Product($this->getDB()))->all();

        return $this->view('user-pages.index', compact('products'));
    }

    public function findUserProduct()
    {
        $this->isUser();
        $Userproduct = new User($this->getDB());
        $Userproducts = $Userproduct->findUserProductById($_SESSION['auth']);
        return $this->view('user-pages.User-products', compact('Userproducts'));

    }

    public function destroy(int $id)
    {
        $product = new User($this->getDB());
        $result = $product->destroy($id);

        if ($result) {
            return header('Location: /your-products');
        }

    }

    public function edit(int $id)
    {
        $this->isUser();

        $product = (new Product($this->getDB()))->findById($id);

        return $this->view('product.AddForm', compact('product'));

    }

    public function update(int $id)
    {
        $this->isUser();
        $sql = new Product($this->getDB());

        $result = $sql->update($id, $_POST);
        $product = $sql->findById($id);

        if ($result) {

            return $this->view('product.AddForm', compact('product'));
        }

    }


    public function addProducts()
    {
        $this->isUser();
        return $this->view('product.AddForm');

    }


    public function createProducts()
    {
        $this->isUser();

        $sql = new Product($this->getDB());
        $result = $sql->create($_POST);

        if ($result) {

            return header("Location: /add-products");
        }

    }
}