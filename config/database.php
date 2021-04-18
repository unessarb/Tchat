<?php

//database credentials const

define('DB_HOST','127.0.0.1');
define('DB_NAME','chat');
define('DB_USERNAME','root');
define('DB_PASSWORD','');


if(!function_exists("getDb")){
    
    function getDb(){
        try{
    
            // $db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD);
        
            // $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $pdo = new PDO("mysql:host=".DB_HOST, DB_USERNAME, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $dbname = "`".str_replace("`","``",DB_NAME)."`";
            $pdo->query("CREATE DATABASE IF NOT EXISTS $dbname");
            $pdo->query("use $dbname");
            $pdo->query("CREATE TABLE IF NOT EXISTS user (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,name varchar(255) NOT NULL,email varchar(255) NOT NULL UNIQUE,password varchar(255) NOT NULL )");
            $pdo->query("CREATE TABLE IF NOT EXISTS message (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,contenu text NOT NULL,user_id INT NOT NULL,destination INT NOT NULL,createdAt datetime NOT NULL DEFAULT CURRENT_TIMESTAMP)");
            
            return $pdo;
            
        }catch(PDOException $ex)
        {
            die("Erreur: ".$ex->getMessage());
        }
    }

}