<?php
//qui gérera les news. C'est elle qui interagira avec la BDD

require 'models/News.php';

class NewsManager extends Bdd
{

     /**
     * Fonction qui retourne tous les articles
     *
     * @return $var;
     */
    public function getNews()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT id, title, content, dateCreation, author FROM articles ORDER BY id ');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new News($data);

        } 
        return $var;

        $req->closeCursor();
    }

    /**
     * Fonction qui récupère les 4 derniers articles
     *
     * @return $var;
     */
    public function getLastNews()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT id, title, content, dateCreation, author FROM articles LIMIT 0,4 ');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new News($data);
        }
        return $var;
        $req->closeCursor();
    }

    /**
     * Fonction qui récupère un article en fonction de son ID
     *
     * @param [type] $id
     * @return new News($data);
     */
    public function getNewsById($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return new News($data);
        $req->closeCursor();
    }

    /**
     * Fonction pour insérer un nouvel article dans la base de données
     *
     * @param [type] $title
     * @param [type] $author
     * @param [type] $content
     * @return $insertNews;
     */
    /*public function insertNews($title, $content,$dateCreation, $author )
    {
        $req = $this->getDb()->prepare('INSERT INTO articles(title, content, DATE_FORMAT(CURDATE(),%d/%m/%Y) as dateCreation ,author ) VALUES (:title,:content, :dateCreation,:author )');
        $insertNews = $req->execute(array(
            
            'title' => $title,           
            'content' => $content,
            'newDate' => $dateCreation,
            'author' =>$author
        ));
        return $insertNews;
    }
*/
   public function insertNews($title, $content,$author )
{
    
    $req= $this->getDb()->prepare('INSERT INTO articles ( title , content, dateCreation, author ) VALUES (?,?,?, NOW())');
    $req->execute(array($title,$content ,$author));
    $req->closeCursor();
}


    /**
     * Fonction pour supprimer un article de la base de données
     *
     * @param [type] $id
     * @return $deleteNews;
     */

    public function deleteNews($id)
    {
        $req = $this->getDb()->prepare('DELETE FROM articles WHERE id = ?');
        $deleteNews = $req->execute(array($id));
        return $deleteNews;
    }

    /**
     * Fonction pour mettre à jour un article
     *
     * @param [type] $id
     * @param [type] $title
     * @param [type] $author
     * @param [type] $content
     * @return $updateNews;
     */
    public function updateNews($title,$content,$author, $id)
    {
        $req = $this->getDb()->prepare('UPDATE articles SET title = :newtitle, 
         content = :newcontent, author = :newauthor WHERE id ='.$id);
        $updateNews = $req->execute(array(
            'newtitle' => $title,         
            'newcontent' => $content,
            'newauthor'=> $author
        ));
        return $updateNews;
    }

    /**
     * Fonction pour vérifier qu'un id corresponde bien à un article
     *
     * @param [type] $id
     * @return $checkChapterId;
     */
    public function checkNewsId($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM articles WHERE id = ?');
        $req->execute(array($id));
        $checkNewsId = $req->rowCount();
        return $checkNewsId;
        $req->closeCursor();
    }




}