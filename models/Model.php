<?php
declare(strict_types=1);
// CLASS DATABASE
abstract class Model
{
      protected $database;
      protected string $table;
      /*CONNEXION DATABASE*/
      public function __construct() {
            try{
                  $this->database = new PDO('mysql:host=db.3wa.io;dbname=rudysaksik_Projet;charset=UTF8',
					'rudysaksik',
					'9efbf4f6e7a53515252a454952cd649f',
                  [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                  ]
                  );
            } catch(PDOException $e) {
                  echo $e->getMessage();
            }
      }
      
    // Comportements obligatoires
    abstract public function insert(array $params);
    
    // Méthode delete.
    public function delete(int $id) :void{
        try{
            //suppression de l'id correspond à notre recherche
            $find=$this->database->prepare(
                "DELETE FROM {$this->table} WHERE id = :id");
            $find->execute([':id' => $id]);

        }catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
    
    // Méthode findAll.
    public function findAll(): ?array {
        try {
            $query = $this->database->query("Select * from {$this->table}");
            $result = $query->fetchAll();
            
            return $result ?? [];
        } catch (PDOException $e) {
            echo $e->getMessage();
            die;
        }
    }
    
    // Méthode de recherche par id
    public function findById(int $id) {
        try {
              $request = $this->database->prepare("
              SELECT *
              FROM {$this->table}
              WHERE id = :id
              ");
              $request->execute([':id' => $id]);
              $result = $request->fetch();
        } catch (PDOException $e) {
              echo $e->getMessage();
              die;
        }
        return $result;
  }
}