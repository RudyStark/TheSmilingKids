<?php 

/**ABOUT-US CONTROLLER**/
// Notre controller About-us.

// Services
require_once 'services/utils.php';
// Models
require_once 'models/Session.php';

// Démarrage de session
Session::start();

// Titre de la page
$pageTitle = "About us";
$pagePath = 'about-us';


// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle'));