<?php
/**REGISTER CONTROLLER**/
// Notre controller register nous permets d'enregistrer les utilisateurs dans la base de données.

// Render
require_once 'services/utils.php';

//Models
require_once "models/Session.php";

// Demarrage de la session
Session::start();

// Titre de la page
$pageTitle = "Donator Informations";
$pagePath = 'process-informations';

if (!empty($_POST)){
    header('Location: payment.php');
}
// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle'));