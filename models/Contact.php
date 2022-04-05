<?php
declare(strict_types=1);

require_once 'Model.php';



//Notre class Contact, nous servira a recevoir et lire nos messages.

class Contact extends Model
{
    protected string $table = 'contact';
    
    // Envoi de message.
    //Injecter nos messages depuis le form vers la base de données.
    public function insert(array $params): void {
            try {
                    $request = $this->database->prepare(
                        "INSERT INTO contact (`name`, `subject`, `content`, `date`, `mail`, `phone`)
                        VALUES (:name, :subject, :content, :date, :mail, :phone)");
                    //Maintenant on éxécute nos éléments du tableau $params situé dans notre controlleur.
                    $request->execute($params);
                        
            } catch (PDOException $e) {
                echo $e->getMessage();
                exit();
            }
    }
    
    //Afficher nos messages par ordre décroissant .
    
    function getMessages() {
        
        try {
            $request = $this->database->prepare(
                "
                SELECT *
                FROM contact
                ORDER BY date DESC
                "
            );
            //on execute
            $request->execute();
            $result = $request->fetchAll();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $result;
    }
}