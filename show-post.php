<?php
/**POST CONTROLLER**/
//Notre controller Read va nous permettres de lire/afficher nos articles.

// Render
require_once 'services/utils.php';

// PDO
require_once "models/Session.php";
require_once "models/Post.php"; 
require_once "models/User.php"; 

// Titre de la page
$pageTitle = 'Dashboard - Articles';
$pagePath = 'admin-show-post';

// Démarrage de la session
Session::start();

// Variable
$author = new User;
$countPost = new Post;

// Condition
if(empty($_POST)){
    

    $user = $author->getPostByAuthor();
    $count = $countPost->countAll();
} 

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle','count','user'));