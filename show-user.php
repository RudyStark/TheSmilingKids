<?php
/**USERS CONTROLLER**/
//Notre controller users va nous permettres d'afficher nos utilisateurs.

// Render
require_once 'services/utils.php';

//Models
require_once "models/Session.php";
require_once "models/User.php"; 

// Titre de la page
$pageTitle = 'Dashboard - Users';
$pagePath = 'admin-users';

//Démarrage de la session
Session::start();

//Variable
$users = new User;
$countUsers = new User;

//Condition
if(empty($_POST)){
    

    $user = $users->findAll();
    $count = $countUsers->countAll();
} 

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle','user','count'));