<?php 

/**CONTACT CONTROLLER**/
//Notre controller Contact va nous permettres l'envoi de notre message.

// Services
require_once 'services/utils.php';
// Models
require_once 'models/Contact.php';
require_once 'models/Session.php';

// Démarrage de session
Session::start();

// Titre de la page
$pageTitle = "Contact";
$pagePath = 'contact';

// Variables
$message = "";
$msg = new Contact;
$date = date('Y-m-d H:i:s');
   
if (!empty($_POST))  {
    //Extraction depuis notre POST
    extract($_POST);
    //Verification avec un filter du format mail.
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "Please enter valid mail address";
    } else {
        //On procède a l'insertion dans la base de données de l'utilisateur.
        $msg->insert(
         [
            ':name' => $name,
            ':subject' => $subject,
            ':content' => $content,
            ':date' => $date,
            ':mail' => $mail,
            ':phone' => $phone,
         ]);
         
        //Redirection vers contact.
   
        header("location: contact.php");
        echo "Message send !";
  }
  
 }

// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle'));