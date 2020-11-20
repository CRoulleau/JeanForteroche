<?php
//recupère ts les articles



function getArticles()
{
    require('_config/db.php');
    $req = $db->prepare('SELECT id, title, date FROM articles ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchAll (PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}


//function qui recupère un article
function getArticle($id)
{
    require('_config/db.php');
    $req = $db->prepare('SELECT * FROM articles WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount()== 1) // si il y a bien une correspondance
    {
      $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else 
        header('Location: index.php?page=home');
          $req->closeCursor();
  
}


function addComment($articleId, $author, $comment)
{
    require('_config/db.php');
    $req= $db->prepare('INSERT INTO comments (post_id, author, comment, comment_date) VALUES (?,?,?, NOW())');
    $req->execute(array($articleId, $author, $comment));
    $req->closeCursor();
}


function getComments($id)
{
    require('_config/db.php');
    $req = $db->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();
}

//function qui recupère un commentaire
function getComment($id)
{
    require('_config/db.php');
    $req = $db->prepare('SELECT * FROM comments WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount()== 1) // si il y a bien une correspondance
    {
      $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else 
        var_dump($getOneComment);
      //  header('Location: index.php?page=home');
          $req->closeCursor();
  
}




    
function deleteComment($id)
{
    require('_config/db.php');
    $req = $db->prepare('DELETE FROM comments WHERE id = ?');
    $req->execute(array($id));
    $data = $req->fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req->closeCursor();

}