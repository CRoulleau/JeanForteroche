<?php
//recupère ts les commentaires
require_once('_functions/getArticles.php');


if(isset($_GET['readId']) && !empty($_GET['readId'])) {
    $editComment = $_GET['readId'];
    $comments = getComments($editComment);
           

    //$editComment = $articleObj->displyCommentById($editId);
  } 



//recupère un commentaire

if(isset($_GET['idComment']) && !empty($_GET['idComment'])) {
    $NoComment = $_GET['idComment'];
    $cancelComment = deleteComment($NoComment);
           var_dump($comments);

}else{
    echo "noooon!!!!!! pas id comment";
}
?>


<!--faire passer id pour afficher l'article-->

<?php
  
  // Include database file
 // include '_classes/Crud.php';

  $articleObj = new Articles();

  // Edit customer record
  if(isset($_GET['readId']) && !empty($_GET['readId'])) {
    $readId = $_GET['readId'];
    $article = $articleObj->displyaRecordById($readId);
  }

  
?>
