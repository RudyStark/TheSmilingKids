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
$pageTitle = "Dashboard - Admin";
$pagePath = 'dashboard';

// Variable
$count = new Post;
$msg = new Contact;
$date = date('Y-m-d');
$findUser = new User;
$id = $_SESSION['auth']['id'];
$counts = $count->countPostsByUser(intval($id));
$messages = $msg->getMessages();
$users = $findUser -> findAll();

// Exécution
if(!empty($_POST)) {
    extract($_POST);
    $isAdmin = 1;
    $idUser= $_POST['users'];
    $findUser->role($isAdmin, $idUser);
    //Redirection vers la connexion.
    header("location: dashboard.php");
}

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle','counts','messages', 'users'));