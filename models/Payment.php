<?php
// Force type hinting
declare(strict_types=1);


//Import de Model
require_once 'Model.php';


class Payment extends Model
{
    protected string $table = 'payment_detail';
    
    public function insert(array $params){
        try{
            $request = $this->database->prepare(
                "INSERT INTO payment_detail (amount, status, donation_detail_id, user_id ) 
                VALUES (:amount, :status, :donation_detail_id, :user_id)");
            $request->execute($params);
            //pour récupérer le dernier id inserer en bdd
            return $this->database->lastInsertId();
            
        }catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}