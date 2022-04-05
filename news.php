<?php

require_once 'services/utils.php';
// PDO
require "models/User.php";
require "models/Post.php";
require "models/Session.php";
require "models/Product.php";
// Démarrage de session
Session::start();

// Titre de la page
$pageTitle = "News";
$pagePath = 'news';
// Variables
$author = new User;

// Fonction:

$posts = $author->getPostByAuthor();
 


// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle', "posts"));