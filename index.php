<?php
//imposter les ressources
include "./env.php";
include "./vendor/autoload.php";

//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test si l'url posséde une route sinon on renvoi à la racine
$path = $url['path'] ??  '/';

session_start();

// import des classes router
use App\Controller\HomeController;
use App\Controller\UserController;

// instanciation du contrôleur
$homeController = new HomeController();
$userController = new UserController();

// Test route
switch (substr($path, strlen(BASE_URL))) {
    case "/":
        $homeController->home();
        break;
    case "/user/connexion":
        $userController->login();
        break;
    default : 
        echo "404";
        break;
}