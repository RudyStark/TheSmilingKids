<?php 

declare(strict_types=1);

////////CREATION COMPTE UTILISATEUR////////
require_once 'Model.php';

class User extends Model
{
    // Fonction pour ajouter un utilisateur dans la base de donnée.
    protected string $table = 'users';
    
    //Implémentation de la méthode abstract.
    public function insert(array $params): void {
            //On utilise ici la méthode findByEmail.
            //On fait un test pour voir si notre email éxiste.
            try {
                if ($this->findByEmail($params[':mail'])) {
                    throw new PDOException("Your email address is already been used");
                } else { //Insertion de l'utilisateur.
                    $requestAddUsers = $this->database->prepare(
                        "INSERT INTO users(`firstname`, `lastname`, `mail`, `password`, `phone`, `address`, `city`, `zipcode`, `country`)
                        VALUES (:firstname, :lastname, :mail, :password, :phone, :address, :city, :zipcode, :country)");
                    //Maintenant on éxécute nos éléments du tableau $params situé dans notre controlleur.
                    $requestAddUsers->execute($params);
                        }
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
                       
            
    }
        
        // Méthode pour vérifier si l'email n'est pas déja enregistrer dans la base données.
        public function findByEmail(string $mail) {
            try {
                    $requestCheckUser = $this->database->prepare(
                    "SELECT * FROM {$this->table} WHERE mail = :mail"
                    );
                    $requestCheckUser->execute([':mail' => $mail]);  
                    $result = $requestCheckUser->fetch();
            } catch (PDOException $e) {
                    echo $e->getMessage();
                    die;
            }
            return $result;
            
        }
        
        //Méthode d'affichage des posts des utilisateurs par ordre décroissant (Le nouvel article s'affichera en premier).
        function getPostByAuthor() {
        
        try {
            $request = $this->database->prepare(
                "
                SELECT *
                FROM users
                INNER JOIN post ON post.user_id = users.id
                ORDER BY date DESC
                "
            );
            //on execute
            $request->execute();
            $getAuthor = $request->fetchAll();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $getAuthor;
        }
        
        // Méthode pour récupérer les donations par utilisateurs
        public function getDonationByUserId(int $id) {
            try {
                  $request = $this->database->prepare(
                        "SELECT user.id as user_id, total, date
                        FROM {$this->table}
                        INNER JOIN users ON donation_detail.user_id = users.id
                        WHERE users.id = :id"
                  );
                  $request->execute(
                        [
                              ':id' => intval($id)
                        ]
                  );
                  $result = $request->fetchAll();
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  die;
            }
            return $result;
          }
        
        
        //*******COUNT USER*******//
        
        //Méthode pour afficher le nombre total d'utilisateurs dans notre base de données.
        function countAll():int{ 
        
        try {
            $request = $this->database->prepare(
                "
                SELECT COUNT(id) AS count
                FROM users
                "
            );
            //on execute
            $request->execute();
            $getCounts = $request->fetch();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return (int) $getCounts['count'];
        }
        
        
        //*******UPDATE USER*******//
    
        //Méthode qui nous servira a modifier nos utilisateurs.
        public function editUser(string $firstname, string $lastname,string $mail, string $phone, string $address, string $city, string $zipcode, string $country, string $id) {
         try {
             $request = $this->database->prepare("
             UPDATE users
             SET
             firstname = :firstname,
             lastname = :lastname,
             mail = :mail,
             phone = :phone,
             address = :address,
             city = :city,
             zipcode = :zipcode,
             country = :country
             WHERE
             id = :id");
             $request->execute(array(
                                    'firstname' => $firstname,
                                    'lastname' => $lastname,
                                    'mail' => $mail,
                                    'phone' => $phone,
                                    'address' => $address,
                                    'city' => $city,
                                    'zipcode' => $zipcode,
                                    'country' => $country,
                                    'id' => $id
                                ));
            //  $requestUpdate = $request->fetchAll();
         } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }
            // return $requestUpdate; 
        }
     
        //Méthode qui nous servira a modifier le role d'un utilisateur.
        
        public function role(string $isAdmin, string $idUser) {
            try{
                  $request = $this->database->prepare(
                        "UPDATE {$this->table} 
                        SET isAdmin = :isAdmin 
                        WHERE id = :id
                        "
                  );
                  $request->execute(['isAdmin' => $isAdmin, 'id' => $idUser]);
            } catch (PDOException $e) {
                  echo $e->getMessage();
                  exit;
            }
        }
        
        
        //*******USER PROFILE*******//
        
        //Méthode pour afficher les informations personnelles de l'utilisateur.
        public function userProfile(string $mail, string $firstname, string $lastname, int $id, string $phone, string $address, string $city, int $zipcode, string $country) {
            try {
                $request = $this->database->prepare("
                SELECT firstname, lastname, mail, phone, address, city, zipcode, country
                FROM {$this->table}
                WHERE users.id = :id"
                );
                //on execute
                $request->execute(array(
                     'firstname' => $firstname,
                     'lastname' => $lastname,
                     'mail' => $mail,
                     'phone' => $phone,
                     'address' => $address,
                     'city' => $city,
                     'zipcode' => $zipcode,
                     'country' => $country,
                     'id' => $id
                    ));
                // $getUserProfile = $request->fetchAll();
                
                } catch (PDOException $e) {
                    echo $e->getMessage();
                    exit();
                    }
                // return $getUserProfile;
        }
}
