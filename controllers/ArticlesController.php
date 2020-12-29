<?php

class ArticlesController
{
    //Ajoute un article
    public function crudAddController(){
   
        $addNews = new NewsManager();
        // Insert NEWS in BDD
        if(isset($_POST['id']))
        {
            $addNews->insertNews($_POST['title'], $_POST['content'] ,$_POST['dateCreation'],$_POST['author']);
        }
        require('views/crudadd_view.php'); //renvoie la vue

    }

    //Edite et enregistre l'article
    public function crudEditController() {
    $articleObj = new NewsManager();

  // Edit  NEWS
    if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $article = $articleObj->getNewsById($editId);
  }

  // Update NEWS in BDD
  if(isset($_POST['id'])) {
    $articleObj->updateNews($_POST['newtitle'] ,
     $_POST['newcontent'],  $_POST['newauthor'], $_POST['id'] );
  }  
    
        require('views/crudedit_view.php'); //renvoie la vue
    }
   
    //affiche l'article et les commentaires
    public function crudReadController(){
        $articleObj = new NewsManager();
        // Edit NEWS
        if(isset($_GET['readId']) && !empty($_GET['readId'])) {
          $readId = $_GET['readId'];
          $article = $articleObj->getNewsById($readId);
        }    
        var_dump($_GET['readId']);   
        
       require('views/crudread_view.php'); //renvoie la vue
  
}

public function getCommentController(){
    $comments = new CommentManager();
    if(isset($_GET['readId']) && !empty($_GET['readId'])) {
    $editComment = $_GET['readId'];
   return $commentDisplayById = $comments->getComments($editComment);
  } 
   

}

public function deleteCommentController(){

    $deleteComment = new CommentManager;
    
    if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteCommentId = $_GET['deleteId'];
     $cancelComment = $deleteComment->deleteComment($deleteCommentId);
   //  header("location:index.php?page=crudread&readId=$_GET['readId']" );

  //$readIdComment = $article->getId();
  //var_dump($article);
  //  &amp;readId=<?php echo $article->getId()
 // return  header('Location:index.php?page=crudread' );

  //return crudread_view avec le readId de l article que tu supprimes
 // require('views/crudread_view.php?readId=<?php echo $article->getId() '); //renvoie la vue
 // index.php?page=crudread&amp;readId=<?php echo $article->getId()
   }

}


public function displayArticlesController() {
   $articleObj = new NewsManager();

    // Delete NEWS from BDD
   if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
        $deleteId = $_GET['deleteId'];
        $articleObj->deleteNews($deleteId);
    }
    if (isset($_GET['msg1']) == "insert") {
        echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                Votre article a été ajouté
              </div>";
        } 
      if (isset($_GET['msg2']) == "update") {
        echo "<div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                Votre article a été modifié
              </div>";
      }
      if (isset($_GET['msg3']) == "delete") {
        echo "Votre article a été supprimé";
      }

    require('views/crud_view.php'); //renvoie la vue
}

public function post(){
    if(!isset($_GET['id']) OR !is_numeric($_GET['id'])){ //si le id n'est pas une valeur numérique on redirige vers home

        header('Location: index.php?page=home');
    }
        else
        {
            extract($_GET); //on extrait le get   
            $id = strip_tags($id); //suprime le html et le php de la variable
            
            
            if(!empty($_POST))
            {
                extract($_POST);//si il y a qq chose on extrait le post
                $errors = array();//
                
                $author = strip_tags($author);
                $comment = strip_tags($comment);
                
                if(empty($author))
                    array_push($errors, "Entrez un pseudo");
                
                if(empty($comment))
                    array_push($errors, "entrez un commentaire");
                
                
                if(count($errors) == 0) // si il y a pas d'erreur
                {
                    $testComment = new CommentManager;
                    $comment = $testComment->addComment($id, $author, $comment);
                    $sucess = "Votre commenntaire a été publié";
                    unset($author); //vide le champ author
                    unset($comment);
                }
            } 
           
           $displayComment = new CommentManager;
            $displayArticle = new NewsManager;
          $comments = $displayComment->getComments($id); 
            $article = $displayArticle->getNewsById($id);

            if(isset($success))
            echo $sucess;
            
        if(!empty($errors)): ?> //si il y a des erreurs on parcours le tableau
        <?php foreach($errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
        
        <?php endif;
            require('views/post_view.php'); //renvoie la vue

        }

             }//fin de post


    

}//fin class

