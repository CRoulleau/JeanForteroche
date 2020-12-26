<?php

include_once '_classes/Articles.php';
?>
//$articlesB = Articles::getAllArticles;
/**
     * Fonction qui retourne tous les commentaires
     *
     * @return $var;
     */
    public function getComments()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT * FROM comments ORDER BY id ');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new Comment($data);

        } 
        return $var;

        $req->closeCursor();
    }

    /**
     * Fonction qui récupère les 4 derniers commentaires
     *
     * @return $var;
     */
    public function getLastComment()
    {
        $var = [];
        $req = $this->getDb()->prepare('SELECT * FROM comments LIMIT 0,4 ');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC))
        {
            $var[] = new Comment($data);
        }
        return $var;
        $req->closeCursor();
    }

    /**
     * Fonction qui récupère un commentaire en fonction de son ID
     *
     * @param [type] $id
     * @return new Comment($data);
     */
    public function getCommentById($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM comments WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return new Comment($data);
        $req->closeCursor();
    }

    /**
     * Fonction pour insérer un nouvel commentaire dans la base de données
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
   public function insertComment($postId, $comment,$author )
{
    
    $req= $this->getDb()->prepare('INSERT INTO comments ( post_id, author, comment, comment_date ) VALUES (?,?,?, NOW())');
    $req->execute(array($postId,$comment ,$author));
    $req->closeCursor();
}


    /**
     * Fonction pour supprimer un article de la base de données
     *
     * @param [type] $id
     * @return $deleteComment;
     */

    public function deleteComment($id)
    {
        $req = $this->getDb()->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment = $req->execute(array($id));
        return $deleteComment;
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
    public function updateComment($postId,$comment,$author)
    {
        $req = $this->getDb()->prepare('UPDATE comments SET post_id = :newPostId, 
         comment = :newComment, author = :newauthor WHERE id ='.$id);
        $updateComments = $req->execute(array(
            'newPostId' => $postId,         
            'newComment' => $comment,
            'newauthor'=> $author
        ));
        return $updateComments;
    }

    /**
     * Fonction pour vérifier qu'un id corresponde bien à un article
     *
     * @param [type] $id
     * @return $checkCommentsId;
     */
    public function checkCommentsId($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM comments WHERE id = ?');
        $req->execute(array($id));
        $checkCommentId = $req->rowCount();
        return $checkCommentId;
        $req->closeCursor();
    }

