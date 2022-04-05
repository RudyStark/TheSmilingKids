<?php
declare(strict_types=1);

require_once 'Model.php';
require_once 'User.php';



////////CREATION/MODIFICATION/SUPRESSION DES ARTICLES////////

class Post extends Model
{
    protected string $table = 'post';
    
    //*******CREATE POST*******//
    
    //Implémentation de la méthode insert.
    public function insert(array $params): void {
        //Méthode ADD du nouvel article
        try {//Ajout de l'article dans la base de donnée.
            $request = $this->database->prepare(
                "INSERT INTO post(`user_id`, `title`, `content`, `date`)
                VALUES (:user, :title, :content, :date)");
            //On éxécute nos éléments du tableau $params situé dans notre controlleur.
            $request->execute($params);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
    
    }
    
    //Méthodes pour afficher notre nombres total d'articles 
    
    function countAll():int{ 
        
        try {
            $request = $this->database->prepare(
                "
                SELECT COUNT(id) AS count
                FROM post
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
    
    //Méthodes pour afficher le nombres total d'articles de chaque utilisateur.
    
    function countPostsByUser(int $id){ 
        
        try {
            $request = $this->database->prepare(
                "
                SELECT COUNT('id') AS count
                FROM post
                INNER JOIN users ON post.user_id = users.id
                WHERE users.id = :id
                "
            );
            //on execute
            $request->execute(
                [
                    ':id' => intval($id)
                ]);
            $result = $request->fetch();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
        return $result;
    }
    
    // Méthode pour récupérer les posts par auteur connecté sur son profil
      public function getPostsByUserId(int $id) {
            try {
                  $request = $this->database->prepare(
                        "SELECT post.id as post_id, post.title, post.content, post.date
                        FROM {$this->table}
                        INNER JOIN users ON post.user_id = users.id
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
    
    //*******UPDATE POST*******//
    
      
     public function editPost(string $title, string $content, string $id) {
         try {
             $request = $this->database->prepare("
             UPDATE post
             SET
             title = :title,
             content = :content
             WHERE
             id = :id");
             $request->execute(array(
                                    'title'     => $title,
                                    'content'  => $content,
                                    'id'        => $id
                                ));
            //  $requestUpdate = $request->fetchAll();
         } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }
            // return $requestUpdate; 
     }
    
    

    
}



