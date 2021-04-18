<?php
namespace App\Model;

class MessageManager{


    public static function getConversations($users,$id){
        
        $db = getDb();

        $messages = [];

       foreach($users as $user){
            $data = [];
            $q = $db->prepare(" SELECT *
                                FROM message
                                WHERE ( user_id =:current_user and destination =:destinataire) or (user_id=:destinataire and destination =:current_user )");
                                
            $q->execute(["current_user"=>$id,"destinataire"=>$user->id]);
            $conversations = $q->fetchAll(\PDO::FETCH_OBJ);
            if($q->rowCount() != 0) {
                $last_message=array_pop($conversations);
                $data['name']=$user->name;
                $data['user_id']=$user->id;
                $data['user_destinataire']=$last_message->user_id;
                $data['contenu']=$last_message->contenu;
                $data['createdAt']=$last_message->createdAt;
                array_push($messages,$data);
            }
            
            $q->closeCursor();
       } 
        usort($messages, sortByCreatedDate('createdAt'));
        return $messages;

    }


    public static function getConversation($id,$curren_user){
        
       $db = getDb();
       
       $q = $db->prepare("  SELECT *
                            FROM message
                            WHERE ( user_id =:curren_user and destination =:id) or (user_id=:id and destination =:curren_user )");
       
       $q->execute(["id"=>$id,"curren_user"=>$curren_user]);
       $q->execute();
        
       $messages = $q->fetchAll(\PDO::FETCH_OBJ);
       $q->closeCursor();
       return $messages;

    }

    public static function saveMessage($user,$message,$user_destinataire){
        
       $db = getDb();
       
       $q = $db->prepare("INSERT INTO message(contenu,user_id,destination) VALUES (:message,:user_id,:user_destinataire)");
       
       return $q->execute(["message"=>$message,"user_id"=>$user,"user_destinataire"=>$user_destinataire]);

    }

   
}