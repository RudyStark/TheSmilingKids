<?php
/**USERPROFILE CONTROLLER**/
//Notre controller Read va nous permettres de modifier le profil de l'utilisateur.

// Render
require_once 'services/utils.php';
//Models
require_once "models/Session.php";
require_once "models/Post.php"; 
require_once "models/User.php"; 

//Démarrage de la session
Session::start();

// Titre de la page
$pageTitle = "Update user profil";
$pagePath = 'update-user-profil';

//Variable
$userM = new User;
$count = new Post;
$id = $_SESSION['auth'];

//Condition

if (empty($_POST)){
    $user = $userM->findById(intval($id));
    $countPost = $count->countAll();
} else{
    // $id = $_SESSION['auth'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zipcode=$_POST['zipcode'];
    $country=$_POST['country'];
    $userM->userProfile(
        $firstname, 
        $lastname, 
        $mail, 
        $id, 
        $phone,
        $address,
        $city,
        $zipcode,
        $country
        );
//Redirection vers la connexion.
   header("location: dashboard.php");
}


// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle'));