<?php

require_once "models/Session.php";
require_once "models/Post.php"; 
require_once "models/Model.php";
require_once "models/User.php";


//Démarrage de session
Session::start();

//Variables
$id= $_GET['id'];
$userM = new User;

//Execution du traitement.
$post = $userM->delete(intval($id));
header("location: show-user.php");
exit;