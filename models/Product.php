<?php
// Force type hinting
declare(strict_types=1);


//Import de Model
require_once 'Model.php';

//Notre class Product, nous servira pour notre système donation.
class Product extends Model 
{
     protected string $table= 'products';
     
     public function insert(array $params): void{
        try{
            if($this->findByName($params[':name'])){
                throw new PDOException("ce produit existe déja");
            }else
            $add=$this->dataBase->prepare(
                "INSERT INTO products(name, description, price) 
                VALUES (:name, :description, :price)");
            $add->execute($params);
        }catch (PDOException $e) {
            echo $e->getMessage();
            exit;
    }
    } 
     
     public function findByName(string $name){
        try{
            $request = $this->database->prepare("SELECT * FROM products WHERE name = :name");
            $request->execute([':name' => $name]);
            $result =$request->fetch();
        }catch (PDOException $e) {
            echo $e->getMessage();
            exit;
    }
    return $result;
    }
}

