<?php

namespace App\Controller;

use App\Model\MessageManager;
use App\Model\UserManager;

class MessageController {

    public static function index(){
        require('src/auth/auth.php');
        $currentUser=getSession("user_id");
        $users = UserManager::getUsers($currentUser);
        $messages = MessageManager::getConversations($users,$currentUser);
        require('src/View/Message/index.view.php');
   
    }

    public static function chat(){
        require('src/auth/auth.php');

        $currentUser=getSession("user_id");
        $id_destinataire = $_GET['id'];

        if(isset($_POST['send'])){
            $errors = [];
            $message = e($_POST["message"]);

            MessageManager::saveMessage( $currentUser,$message,$id_destinataire);
        }
        else{
            clean_input_data();
        }
        
        if(isset($id_destinataire) && $id_destinataire != 0 ){
            $users = UserManager::getUsers($currentUser);
            $conversations = MessageManager::getConversations($users,$currentUser);
            $messages= MessageManager::getConversation($id_destinataire,$currentUser);
            $user = UserManager::getUser($id_destinataire);
            require('src/View/Message/chat.view.php');
            die();
        }
        else{
            redirect('/');
        }
      
    }
}