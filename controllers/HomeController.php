<?php
require '_classes/NewsManager.php';
require '_classes/CommentManager.php';


//require du modèle utilise
class HomeController{

    public function home() {
        require('views/home_view.php'); //renvoie la vue
    }
    public function biographie() {
        require('views/biographie_view.php'); //renvoie la vue
    }
    public function contact() {
        require('views/contact_view.php'); //renvoie la vue
    }
    public function livre(){
        $displayArticles = new NewsManager();
        $displayArticles->getNews();
        require('views/livre_view.php');
    }
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
               // $article = getArticle($id); 
                //$comments = getComments($id);
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

    public function crud() {
        $articleObj = new NewsManager();

        // Delete record from table
        if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
            $deleteId = $_GET['deleteId'];
            $articleObj->deleteNews($deleteId);
        }

        require('views/crud_view.php'); //renvoie la vue
    }

    public function crudAdd(){
   
        $addNews = new NewsManager();
        // Insert Record in customer table
        if(isset($_POST['id']))
        {
            $addNews->insertNews($_POST['title'], $_POST['content'] ,$_POST['dateCreation'],$_POST['author']);
        }
        require('views/crudadd_view.php'); 

    }
    public function crudEdit() {
        $articleObj = new NewsManager();



  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $article = $articleObj->getNewsById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['id'])) {
    $articleObj->updateNews($_POST['newtitle'] ,
     $_POST['newcontent'],  $_POST['newauthor'], $_POST['id'] );
  }  
    
        require('views/crudedit_view.php'); //renvoie la vue
    }

    public function crudRead(){
        $articleObj = new NewsManager();
        // Edit customer record
        if(isset($_GET['readId']) && !empty($_GET['readId'])) {
          $readId = $_GET['readId'];
          $article = $articleObj->getNewsById($readId);
        }
        $comments = new CommentManager();

    if(isset($_GET['readId']) && !empty($_GET['readId'])) {
    $editComment = $_GET['readId'];
  $commentDisplayById = $comments->getComments($editComment);
  } 
  //recupère un commentaire
    $deleteComment = new CommentManager;
    if(isset($_GET['idComment']) && !empty($_GET['idComment'])) {
    $NoComment = $_GET['idComment'];    
    $cancelComment = $deleteComment->deleteComment($NoComment);
    }else{
    echo "noooon!!!!!! pas id comment";
    }  
    require('views/crudread_view.php'); //renvoie la vue
  
}

    
    
    

    //FONCTION AFFICHER PAGE AVEC LISTE DES NEWS
    //INSTANCIER MON MODELE (variable)
    //MODELE VARIABLE->function
    //require de ma vue pour afficher ses commentaire



}