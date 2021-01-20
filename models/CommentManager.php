<?php

class CommentManager extends Bdd
{

    public function addComment($articleId, $author, $comment)
    {
        $req = $this->getDb()->prepare('INSERT INTO comments (post_id, author, comment, comment_date, reportedComment) VALUES (?,?,?, NOW(), true)');
        $req->execute(array($articleId, $author, $comment));
        $req->closeCursor();
    }


    public function getComments($id)
    {
        $req = $this->getDb()->prepare('SELECT * , DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS DateComment FROM comments WHERE post_id = ? ORDER BY DateComment DESC');
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
        if ($req->rowCount() == 1) // si il y a bien une correspondance
        {
            $data = $req->fetch(PDO::FETCH_OBJ);
            return $data;
        } else

            $req->closeCursor();
    }


    public function deleteComment($id)

    {
        $req = $this->getDb()->prepare('DELETE  FROM comments WHERE id = ?');
        $deleteComment = $req->execute(array($id));
        return $deleteComment;
    }

    //signaler commentaire : mise à jour bdd
    public function reportedComment($id)
    {
        $req = $this->getDb()->prepare('UPDATE comments SET reportedComment = ?  WHERE id = ?');
        $req->execute(array("true", $id));
    }

    //methode avec select qui va afficher les commentaires 
    //elle va recuperer les infos : champ reportedComment

    public function displayCommentsReported()
    {
        $var = [];

        $req = $this->getDb()->prepare('SELECT * , DATE_FORMAT(comment_date, \'%d/%m/%Y \') AS DateComment FROM comments WHERE reportedComment = "true" ');


        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new Comment($data);
        }
        return $var;

        $req->closeCursor();
    }

    //on va faire un update pour remettre dans le fil actualité=>approuver le commentaire

    public function approveComment($id)
    {
        $req = $this->getDb()->prepare('UPDATE comments SET reportedComment = ?  WHERE id = ?');
        $req->execute(array("false", $id));
    }
    //return bool
    //fonction qui va verifier si un id est ds la bdd
    public function checkCommentId($id)
    {
        $req = $this->getDb()->prepare('SELECT * FROM comments WHERE id = ?');
        $req->execute(array($id));
        $checkCommentId =  $req->fetch();
        return $checkCommentId;
    }
}//fin class
