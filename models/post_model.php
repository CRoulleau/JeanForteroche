<?php



//COMMENTAIRE

/*if (isset($_POST['submit_comment'])) {
    if (isset($_POST['author'], $_POST['comment']) AND !empty($_POST['author']) AND !empty($_POST['comment']))
    {
        $author =  htmlspecialchars($_POST['author']);
        $comment =  htmlspecialchars ($_POST['comment']);
        
         $req_comment = $db->prepare('INSERT INTO comments (author, comment, post_id) VALUES (?,?,?)');
            $req_comment->execute(array(
                $author,
                $comment, 
                $_POST['post_id']));
        
        
        
    }    
    
} else {
    echo "erreur ";
}

*/



//article
if (isset ($_GET['id']) && !empty($_GET['id'])){
    $getId = htmlspecialchars($_GET['id']);    
$req = $db->prepare('SELECT id, title, content FROM articles WHERE id = ?');
$req->execute(array($getId));  

}else{
    echo "cet article n'existe plus"; 
}

$reponse = $db->query('SELECT articles.id as idArticles , comments.comment as postId
FROM articles
INNER JOIN comments 
ON articles.id = comments.post_id');


// Récupération des 10 derniers messages
//$reponse = $db->query('SELECT author, comment FROM comments ORDER BY id DESC LIMIT 0, 10');
    


// Insertion du message à l'aide d'une requête préparée
/*$req_comment = $db->prepare('INSERT INTO comments (author, comment, post_id) VALUES(?, ?, ?)');
$req_comment->execute(array($_POST['author'], $_POST['comment'] ));

// Redirection du visiteur vers la page du minichat
header('Location: post_view.php');
*/


?>