<?php

require_once "models/Session.php";
require_once "models/Post.php"; 
require_once "models/Model.php";
require_once "models/User.php";


//Démarrage de session
Session::start();

//Variables
$id= $_GET['id'];
$postM = new Post;

//Execution du traitement.
$post = $postM->delete(intval($id));
header("location: show-post.php");
exit;
        
//View