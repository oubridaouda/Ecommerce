<?php

namespace Controller\User;

use Controller\controller;
use Models\Product;
use Models\User;

class UserController extends controller
{


    public function login()
    {
        return $this->view('connexion.Login');

    }

    //function de connexion d'un utilisateur
    public function loginPost()
    {
        $user = (new User($this->getDB()))->getByUsername($_POST['username']);

        //Verification de la correspondance du mot de passe hashé
        if(password_verify($_POST['password'], $user->password)){
            $_SESSION['auth'] = $user->id;
            return header('location: /your-products?success=true');
        }else{
            return header("Location: /login");
        }

    }

    public function signup()
    {
        return $this->view('connexion.SignUp');

    }

    public function signupPost()
    {
        $sql = new User($this->getDB());
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = $sql->query("INSERT INTO users (username, password) VALUES ('".$_POST['username']."','".$password."')", $_POST);

        return header("Location: /login");

    }

    public function logout(){
        session_destroy();
        return header("Location: /");
    }

}