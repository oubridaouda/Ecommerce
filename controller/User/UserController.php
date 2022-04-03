<?php

namespace Controller\User;

use Controller\controller;
use Models\Product;
use Models\User;
use Exception;

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
//        if (password_verify($_POST['password'], $user->password)) {
        if ($this->handleCrypt($_POST['password'], true, $user->password)) {
            $_SESSION['auth'] = $user->id;
            $_SESSION['username'] = $user->username;
            return header('location: /your-products?success=true');
        } else {
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
//        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password = $this->handleCrypt($_POST['password']);
        $result = $sql->query("INSERT INTO users (username, password) VALUES ('" . $_POST['username'] . "','" . $password . "')", $_POST);

        return header("Location: /login");

    }

    public function logout()
    {
        session_destroy();
        return header("Location: /");
    }

    /**
     * password encryption and decryption function
     * based on the sha512 algorithm.
     * - action is
     * - true if a hash must be verified,
     * - or false if one is must be to create.
     * @return String | Bool
     */
    private function handleCrypt($plainText = null, Bool $action = false, String $from_database = null){
        try{
            $prehash = hash('sha512', $plainText);

            if($action){
                return $from_database && password_verify($prehash, $from_database);
            }else{
                return password_hash($prehash, PASSWORD_DEFAULT);
            }

        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

}