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
            $verify = $sql->getByUsername($_POST['username']);
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

    public function ResetPasswordPage()
    {
        return $this->view('connexion.ResetPasswordPage');
    }

    public function resetForm()
    {
        return $this->view('connexion.ResetPasswordForm');
    }

    //Function de récupération d'un mot de passe
    public function resetFormPost()
    {
        $sql = new User($this->getDB());
        $verify = $sql->getByUsername($_POST['email']);
        if (!empty($verify)) {

            date_default_timezone_set("UTC");
            $pass = "$verify->username," . time();
            //Générer un mot de passe ou token
            $token = $this->handleCrypt($pass);
            //insertion d'un mot de passe oublié dans la bd
            $update = $sql->query("UPDATE users SET recovery_password = '" . $token . "', update_date = UTC_TIMESTAMP WHERE id ={$verify->id}", $_POST);
            //L'url de reinitialisation de mot de passe
            $url = $_SERVER['HTTP_HOST'] . "/reset-password-verify&rstpwd=" . $token;
            //Envoyer un mail pour changer le mot de passe
            mail($verify->username, 'This is a test subject line', $url);

            return header("Location: /login&reset-email-send=true");
        } else {

            return header("Location: /reset-form&success=false");
        }
    }

    public function resetPasswordVerify()
    {

        var_dump($_GET['rstpwd']);
//        return header("Location: /reset-page");
    }

    public function resetPasswordForm()
    {
        return $this->view('connexion.ResetPassword');
    }

    public function resetPasswordFormPost()
    {
        return header("Location: /reset-password-form");
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