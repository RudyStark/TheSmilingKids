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
$pageTitle = "Home";
$pagePath = 'home';
// Variables
$author = new User;
$product = new Product;

// Fonction:

$posts = $author->getPostByAuthor();
$products = $product->findAll();
 


// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle', 'products'));




