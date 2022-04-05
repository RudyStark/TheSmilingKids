<?php

// Force type hinting
declare(strict_types=1);


//Import de Model
require_once 'Model.php';


class Donation_detail extends Model
{
    protected string $table= 'donation_detail';
    
    public function insert(array $params){
        try{
            $add=$this->database->prepare(
                "INSERT INTO donation_detail (date, total, user_id) 
                VALUES (now(), :total, :user_id)");
            $add->execute($params);
            //pour récupérer le dernier id inserer en bdd
            return $this->database->lastInsertId();
            
        }catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
    
      
     //*******COUNT DONATORS*******//
        
    //Méthode pour afficher le nombre total de donators dans notre base de données.
    function countAll():int{ 
        
        try {
            $request = $this->database->prepare(
                "
                SELECT COUNT(id) AS count
                FROM {$this->table}
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
        
}

