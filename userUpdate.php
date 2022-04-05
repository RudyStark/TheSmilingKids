<?php
/**userUpdate CONTROLLER**/
//Notre controller Update va nous permettres de modifier nos utilisateurs.

// Render
require_once 'services/utils.php';

//Models
require_once "models/Session.php";
require_once "models/User.php";

// Titre de la page
$pageTitle = 'Dashboard - Update User';
$pagePath = 'update-user-profil';

//Démarrage de la session
Session::start();

//Variable
$id=$_GET['id'];
$userM = new User;



//Traitement

if (empty($_POST)){
    $user = $userM->findById(intval($id));
} else{
    $id=$_GET['id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zipcode=$_POST['zipcode'];
    $country=$_POST['country'];
    $userM->editUser($firstname, $lastname, $mail, $phone, $address, $city, $zipcode, $country, $id);
    $_SESSION['auth']['name'] = $firstname;
    $_SESSION['auth']['lastname'] = $lastname;
    $_SESSION['auth']['mail'] = $mail;
    $_SESSION['auth']['phone'] = $phone;
    $_SESSION['auth']['address'] = $address;
    $_SESSION['auth']['city'] = $city;
    $_SESSION['auth']['zipcode'] = $zipcode;
    $_SESSION['auth']['country'] = $country;
    // $_SESSION['auth'] = 
    // [
    //     ':name' => $firstname,
    //     ':lastname' => $lastname,
    //     ':mail' => $mail,
    //     ':phone' => $phone,
    //     ':address' => $address,
    //     ':city' => $city,
    //     ':zipcode' => $zipcode,
    //     ':country' => $country
    // ];
    header('Location: dashboard.php');
    exit;
}

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle','user', 'userM', 'id'));