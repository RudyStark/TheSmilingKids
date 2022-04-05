<!--Controlleur pour l'authentification de l'utilisateur-->

<?php

// Render
require_once 'services/utils.php';

// PDO
require_once "models/User.php";
require_once "models/Session.php";
require_once "models/Post.php";

// Titre de la page
$pageTitle = "Sign-in";
$pagePath = 'login';

// Variable
$userM = new User;
$postM = new Post;
$countM = new Post;
$addUsers = new User;
            
try {
        if (!empty($_POST)) {
            extract($_POST);
            $user = $userM->findByEmail($mail);
                if (empty($user)) {
                // Verification si l'utilisateur éxiste.
                throw new DomainException("Ce nom d'utilisateur n'existe pas");
        
                } else {
        
                    // L'utilisateur existe bien => on vérifie si son mot de passe correspond à celui qui a été tapé
                    // On utilise password_verify afin de vérifier le password s'il éxiste bien.
                        if (password_verify($password, $user['password'])) {
                            // Si le password est correct nous procédons a la connexion.
                            // Puis on enregistre dans la session.
                            Session::start();
                            $post = $postM->getPostsByUserId($user['id']);
                            $count = $countM->countPostsByUser($user['id']);
                            Session::init($user['id'],$user['firstname'],$user['lastname'],$mail,$user['phone'],$user['address'],$user['city'],$user['zipcode'],$user['country'], $user['isAdmin']);
                            Session::setError(); //Vider l'historique de notifs
                            echo json_encode(['auth' => $user]);
                            echo ("vous êtes connecter");
                            header("location: index.php");
                            exit(); 
                        } else {
                            // Password non correct.
                            throw new DomainException("Mot de passe erroné");
                        }
    
                }
        }
    
} catch (DomainException $e) {
        echo $e->getMessage(); 
    
}
            
            


// Rendu de la vue
render(__DIR__."/views/$pagePath", compact('pageTitle'));