<?php
namespace App\Model;

class UserManager{
    

    public static function checkDataBaseData(){

        $db = getDb();

        $q = $db->prepare("SELECT id,name,password FROM user");
        $q->execute();

        $coutUsers=$q->rowCount();
        if($coutUsers == 0){ 
            $q = $db->prepare("INSERT into user (name,email,password) VALUES(:name,:email,:password)");
            $q->execute([
                "name"=>"Youness ARBOUH",
                "email"=>"admin@gmail.com",
                "password"=>password_hash("123456",PASSWORD_BCRYPT)
            ]);
            $user_test= $db->lastInsertId();

            $faker = \Faker\Factory::create();

            for ($i = 0; $i < 4; $i++) {
                $q = $db->prepare("INSERT into user (name,email,password) VALUES(:name,:email,:password)");
                $q->execute([
                    "name"=>$faker->unique()->name,
                    "email"=>$faker->unique()->email,
                    "password"=>password_hash("123456",PASSWORD_BCRYPT)
                ]);
                $current_user = $db->lastInsertId();
                for ($j = 0; $j < 10; $j++) {
                    $q = $db->prepare("INSERT INTO message(contenu,user_id,destination) VALUES (:message,:user_id,:user_destinataire)");
                    $q->execute(["message"=>$faker->paragraph(),"user_id"=>$j & 1?$user_test:$current_user,"user_destinataire"=>$j & 1?$current_user:$user_test ]);
                  }
              }
           
        }
    }

    public static function login($email,$password){
        $db = getDb();

        $q = $db->prepare("SELECT id,name,password FROM user WHERE  email = ?");
        
        $q->execute([
            $email
        ]);
        $user = $q->fetch(\PDO::FETCH_OBJ);

        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        } else {
            return NULL;
        }
        
     }

    public static function getUsers($id){
        $db = getDb();
        $q = $db->prepare("SELECT * FROM user WHERE id <> ?");
        $q->execute([$id]);
        $users = $q->fetchAll(\PDO::FETCH_OBJ);
        return $users;
     }

       
    public static function getUser($id){
        $db = getDb();
        $q = $db->prepare("SELECT * FROM user WHERE id = ?");
        $q->execute([$id]);
        $users = $q->fetch(\PDO::FETCH_OBJ);
        return $users;
     }
}