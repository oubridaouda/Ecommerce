<?php

namespace Controller;

use Database\DbConnection;

class ArticleController extends controller
{
    public function index()
    {
        return $this->view('product.index');
    }

    public function login()
    {
        return $this->view('connexion.Login');

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