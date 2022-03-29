<?php

namespace Controller;

class ArticleController extends controller
{
    public function index()
    {
        return $this->view('product.index');
    }

    public function login(int $id)
    {
        return $this->view('connexion.LoginView');

    }

    public function products($id)
    {
        return $this->view('product.ProductDetail', compact('id'));

    }

    public function subscription()
    {
            return $this->view('connexion.Subscription');

    }

    public function users(int $id)
    {
        return $this->view('connexion.Users', compact('id'));

    }
}