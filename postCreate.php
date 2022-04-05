<?php
/**POST CREATE CONTROLLER**/
//Notre controller Create va nous permettre la création d'articles.

// Render
require_once 'services/utils.php';

// Models
require_once "models/Session.php";
require_once "models/Post.php"; 
require_once "models/User.php";

// Titre de la page
$pageTitle = 'Dashboard - New Post';
$pagePath = 'admin-addPost';

// Démarrage de la session
Session::start();

// Variables
$message = "";
$postM = new Post;
$userM = new User;
$date = date('Y-m-d H:i:s');

if(empty($_POST)){
    // Appel de nos users si vide
    $users = $userM->findAll();
} else {
        extract($_POST);
        $users = $userM->findAll();
        $postM -> insert(
            [
              ':user' => $user,
              ':title' => $title,
              ':content' => $content,
              ':date' => $date
            ]
        );
        header('Location: dashboard.php');
        exit;
        echo "Post success !";
      }

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle','users','postM'));



//A FAIRE:
//SELECTIONNER SEULEMENT LES AUTEURS .