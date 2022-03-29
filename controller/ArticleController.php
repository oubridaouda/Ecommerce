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

    public function products()
    {
        return $this->view('product.index');

    }

    public function subscription()
    {
            return $this->view('connexion.Subscription');

    }
}