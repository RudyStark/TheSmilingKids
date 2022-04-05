<?php
/**DONATOR LIST CONTROLLER**/
//Notre controller donator list va nous permettres d'afficher nos donateurs.

// Render
require_once 'services/utils.php';

//Models
require_once "models/Session.php";
require_once "models/Donation_detail.php"; 

// Titre de la page
$pageTitle = 'Dashboard - Donator List';
$pagePath = 'donator-list';

//Démarrage de la session
Session::start();

//Variable
$donators = new Donation_detail;
$countDonators = new Donation_detail;

//Condition

//Coming Soon

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle'));