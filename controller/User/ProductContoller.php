<?php

namespace Controller\User;

use Controller\controller;
use Models\Product;
use Models\User;

class ProductContoller extends controller
{

    //Page d'accueil
    public function index()
    {
        $this->isUser();
        $products = (new Product($this->getDB()))->all();

        return $this->view('user-pages.index', compact('products'));
    }

    //Liste de produits d'un utilisateur
    public function findUserProduct()
    {
        $this->isUser();
        $Userproduct = new User($this->getDB());
        $Userproducts = $Userproduct->findUserProductById($_SESSION['auth']);
        return $this->view('user-pages.User-products', compact('Userproducts'));

    }

    //Supression d'un produit
    public function destroy(int $id)
    {
        $product = new User($this->getDB());
        $result = $product->destroy($id);

        if ($result) {
            return header('Location: /your-products');
        }

    }

    //Edition d'un produit
    public function edit(int $id)
    {
        $this->isUser();

        $product = (new Product($this->getDB()))->findById($id);

        return $this->view('user-pages.User-products', compact('product'));

    }

    //Function d'edition d'un produit
    public function update()
    {
        $this->isUser();
        $sql = new Product($this->getDB());

        $result = $sql->update($_POST);
        $product = $sql->findById($_POST['product_id']);

        if ($result) {

            return header('Location: /your-products');

        }

    }

    public function addProducts()
    {
        $this->isUser();
        return header("Location: /your-products&success=true");

    }

    //Function d'ajout d'un produit
    public function createProducts()
    {
        $this->isUser();

        $sql = new Product($this->getDB());
        $result = $sql->create($_POST, $_FILES);

        if ($result) {

            return header("Location: /add-products");
        }

    }
}