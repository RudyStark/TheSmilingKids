<?php
// Force type hinting
declare(strict_types=1);


//Import de Model
require_once 'Model.php';


class Donation_product extends Model
{
    protected string $table= 'Donation_product';
    
    public function insert(array $params): void{
        try{
            $add=$this->database->prepare(
                "INSERT INTO donation_product(quantity, donation_detail_id, products_id, price) 
                VALUES (:quantity, :donation_detail_id, :products_id, :price)");
            $add->execute($params);
        }catch (PDOException $e) {
            echo $e->getMessage();
            exit;
    }
    }
}