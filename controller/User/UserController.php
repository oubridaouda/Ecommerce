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
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = (new User($this->getDB()))->getByUsername($_POST['username']);

            //Verification de la correspondance du mot de passe hashé
//        if (password_verify($_POST['password'], $user->password)) {
            if ($this->handleCrypt($_POST['password'], true, $user->password)) {
                $_SESSION['auth'] = $user->id;
                $_SESSION['username'] = $user->username;
                return header('location: /login&success=true');
            } else {
                return header("Location: /login&success=false");
            }
        } else {
            return header("Location: /login&success=null");
        }

    }

    public function signup()
    {
        return $this->view('connexion.SignUp');

    }

    public function signupPost()
    {


        if (!empty($_POST['password']) && !empty($_POST['username'])) {
            $sql = new User($this->getDB());
            $verify = $sql->getByUsername($_POST['username']) ;
//            echo '<pre>';
//            print_r(isset($verify->username));
//            echo '<pre>';
//            die();
            //if user does not exist
            if (!isset($verify->username)) {

                $password = $this->handleCrypt($_POST['password']);
                $result = $sql->query("INSERT INTO users (username, password) VALUES ('" . $_POST['username'] . "','" . $password . "')", $_POST);

            } else {
                return header("Location: /signup&success=null");
            }
        }
        if ($result) {

            $user = (new User($this->getDB()))->getByUsername($_POST['username']);
            $_SESSION['auth'] = $user->id;
            $_SESSION['username'] = $user->username;

            return header("Location: /signup&success=true");

        } else {
            return header("Location: /signup&success=false");
        }

    }

    public function logout()
    {
        session_destroy();
        return header("Location: /login");
    }

    /**
     * password encryption and decryption function
     * based on the sha512 algorithm.
     * - action is
     * - true if a hash must be verified,
     * - or false if one is must be to create.
     * @return String | Bool
     */
    private function handleCrypt($plainText = null, bool $action = false, string $from_database = null)
    {
        try {
            $prehash = hash('sha512', $plainText);

            if ($action) {
                return $from_database && password_verify($prehash, $from_database);
            } else {
                return password_hash($prehash, PASSWORD_DEFAULT);
            }

        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}