<?php

require 'vendor/autoload.php';
session_start();

use App\Controller\MessageController;
use App\Controller\UserController;

$url=  $_SERVER["PATH_INFO"] ??  $_SERVER["REQUEST_URI"] ;
switch ($url) {
    case '/':
        MessageController::index();
        break;
    case '/login':
        UserController::login();
        break;
    case '/logout':
        UserController::logout();
        break;
    case '/chat':
        MessageController::chat();
        break;
    
    default:
        redirect("/");
        break;
}