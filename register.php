<?php
/**REGISTER CONTROLLER**/
// Notre controller register nous permets d'enregistrer les utilisateurs dans la base de données.

// Render
require_once 'services/utils.php';

//Models
require_once "models/Session.php";
require_once "models/User.php";

// Demarrage de la session
Session::start();

// Titre de la page
$pageTitle = "Register";
$pagePath = 'register';

//Variables
$message = "";
$addUsers = new User;

//On procède a une série de vérification:
if (!empty($_POST)) {
 //Verification de notre clé si elle éxiste.
 if (array_key_exists('mail', $_POST) && !empty($_POST['mail'])) {
  //Extraction depuis notre POST
  extract($_POST);
  //Verification avec un filter du format mail.
  if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
   echo "Please enter valid mail address";
  }
  else {
      //On procède a l'insertion dans la base de données de l'utilisateur.
   $addUsers -> insert(
    [
    //Nous procèdons maintenant a l'association de nos clés associations
    ':mail' => $mail,
    ':password' => password_hash($password,PASSWORD_DEFAULT),
    ':lastname' => $lastname,
    ':firstname' => $firstname,
    ':phone' => $phone,
    ':address' => $address,
    ':city' => $city,
    ':zipcode' => $zipcode,
    ':country' => $country,
    ]
   );
   //Redirection vers la connexion.
   header("location: login.php");
  }
 }

}




// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle'));