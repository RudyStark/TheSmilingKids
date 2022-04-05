<?php
/**POST CONTROLLER**/
//Notre controller Update va nous permettres de modifier nos articles.

// Render
require_once 'services/utils.php';

// Models
require_once "models/Session.php";
require_once "models/Post.php";
require_once "models/User.php";

// Titre de la page
$pageTitle = 'Dashboard - Update Post';
$pagePath = 'admin-post-update';

// Démarrage de la session
Session::start();

// Variable
$id=$_GET['id'];
$postM = new Post;


if (empty($_POST)){
    $post = $postM->findById(intval($id));
} else{
    $id=$_GET['id'];
    $title=$_POST['title'];
    $content=$_POST['content'];
    $postM->editPost($title, $content, $id);
    header('Location: postRead.php');
}

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle','post', 'postM', 'id'));