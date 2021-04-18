<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController
{

    public static function login(){
        require('src/auth/guest.php');
        UserManager::checkDataBaseData();

        if(isset($_POST['login'])){

            $errors = [];
            $email = e($_POST["email"]);
            $password = e($_POST["password"]);


           $user= UserManager::login($email,$password);
            if($user)
            {
                $_SESSION['user_id']= $user->id;
                $_SESSION['name']= $user->name;
                redirect('/');
            }
            else{
                $errors[]="Email ou Mot de passe incorrecte";
                save_input_data();
            }
        
        }
        else{
            clean_input_data();
        }


        require('src/View/Login/login.view.php');

    }
    public static function logout(){

        session_start();
        session_destroy();
        $_SESSION = [];
        redirect('login');
   
    }

}