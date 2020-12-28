<?php
require 'models/Comment.php';

class CommentManager extends Bdd
{

   public function addComment($articleId, $author, $comment)
{
    $req= $this->getDb()->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES (?,?,?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}


    public function getComments($id)
{
    $req = $this->getDb()->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

//function qui recupère un commentaire
    public function getComment($id)
{
    $req = $this->getDb()->prepare('SELECT * FROM comments WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount()== 1) // si il y a bien une correspondance
    {
      $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else 
       // var_dump($getOneComment);
      //  header('Location: index.php?page=home');
          $req->closeCursor();
  
}

    
    public function deleteComment($id)

{
    $req = $this->getDb()->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment = $req->execute(array($id));
        return $deleteComment;

    

}







}//fin class





