<?php

// Render
require_once 'services/utils.php';

// PDO
require_once "models/Session.php";
require_once "models/Post.php"; 
require_once "models/User.php";
require_once "models/Contact.php";

// Demarrage de la session
Session::start();

// Titre de la page
$pageTitle = "Account - My profile";
$pagePath = 'myprofile';

// Variable
$date = date('Y-m-d');
$id = $_SESSION['auth']['id'];

// Exécution
if (Session::isConnected() && $_SESSION['auth']) {
   
} else {
    header ('Location: index.php');
    exit();
}

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle'));