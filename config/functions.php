<?php


if(!function_exists("redirect")){
    
    function redirect($page){
        
        header("Location: ".$page);
        exit();

    }

}

if(!function_exists("sortByCreatedDate")){
    
    function sortByCreatedDate($key) {
        return function ($a, $b) use ($key) {
            if ($a[$key] == $b[$key]) {
                return 0;
            }
            return ($a[$key] > $b[$key]) ? -1 : 1;

        };
    }

}

if(!function_exists("getSession")){
    
    function getSession($key){
        
        return $_SESSION[$key];

    }

}



if(!function_exists("check_active")){
    
    function check_active($destinataire,$current_destinataire){
        if($destinataire == $current_destinataire){
            return "active_chat";
        }
        else{
            return "";
        }
    }

}


if(!function_exists("e")){
    
    function e($string ){
        if($string){
           return htmlspecialchars($string);
        }
    }


}


if(!function_exists("save_input_data")){
    
    function save_input_data(){
        
        foreach($_POST as $key => $value){

            !strpos("password",$key) &&
            $_SESSION["input"][$key]=e($value);

        }

    }

}

if(!function_exists("get_input_data")){
    
    function get_input_data($key){
        $value =null;
        isset($_SESSION["input"][$key]) && $value=  $_SESSION["input"][$key];
        return $value;
    }

}

if(!function_exists("clean_input_data")){
    
    function clean_input_data(){
        $_SESSION["input"]=null;
    }

}