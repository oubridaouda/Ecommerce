<?php

namespace Controller;

use Database\DbConnection;

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
        $db = new DbConnection('e_commerce','localhost','root','');

        $req = $db->getPDO()->query('select * from users');
        $posts = $req->fetchAll();
        var_dump($req);
        foreach($posts as $post){
            echo $post->username;
        }

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