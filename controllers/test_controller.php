<?php

class CommentController
{
    public function post(){
        if(!isset($_GET['id']) OR !is_numeric($_GET['id'])){ //si le id n'est pas une valeur numérique on redirige vers home

            header('Location: index.php?page=home');
        }
            else
            {
                extract($_GET); //on extrait le get   
                $id = strip_tags($id); //suprime le html et le php de la variable
               // require_once('_functions/getArticles.php');
                
                
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





    
}