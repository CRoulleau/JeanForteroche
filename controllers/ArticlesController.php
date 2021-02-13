<?php

class ArticlesController
{
  // public function __construct()
  // {
  //   if (!isset($_SESSION['user'])) {
  //     header("location: index.php?page=home"); //securite cela va bloquer les autres fonctions
  //     echo "erreur";
  //   }
  // }
  //construct en option pour verification des sessions, si cela ne marche pas on met par fonction pour verifier s'il y a une session pour securiser crud
  //Ajoute un article
  public function crudAddController()
  {

    $addNews = new NewsManager();
    // Insert NEWS in BDD
    if (isset($_POST['id'])) {
      $addNews->insertNews($_POST['title'], $_POST['content'], $_POST['author']);
    }
    require('views/crudadd_view.php'); //renvoie la vue

  }

  //Edite et enregistre l'article
  public function crudEditController()
  {
    $articleObj = new NewsManager();

    // Edit  NEWS
    if (isset($_GET['editId']) && !empty($_GET['editId'])) {
      $editId = $_GET['editId'];
      $article = $articleObj->getNewsById($editId);
    }

    // Update NEWS in BDD
    if (isset($_POST['id'])) {
      $articleObj->updateNews(
        $_POST['newtitle'],
        $_POST['newcontent'],
        $_POST['newauthor'],
        $_POST['id']
      );
    }

    require('views/crudedit_view.php'); //renvoie la vue
  }

  //affiche l'article et les commentaires
  public function crudReadController()
  {
    $articleObj = new NewsManager();
    // Edit NEWS
    if (isset($_GET['readId']) && !empty($_GET['readId'])) {
      $readId = $_GET['readId'];
      $article = $articleObj->getNewsById($readId);
    }

    require('views/crudread_view.php'); //renvoie la vue

  }

  public function getCommentController()
  {
    $comments = new CommentManager();
    if (isset($_GET['readId']) && !empty($_GET['readId'])) {
      $editComment = $_GET['readId'];
      return $commentDisplayById = $comments->getComments($editComment);
    }
  }
  //signaler un commentaire
  public function reportedComment()
  {
    if (isset($_GET['id']) && !empty($_GET['id'])) {

      $comments = new CommentManager();
      $comments->reportedComment($_GET['id']);
      header("location: index.php?page=post&id=" . $_GET['postId']);
    } else {
      echo "erreur pas id";
    }
    //securite numro ou vérification numéro avant de lancer l'action; 
    //fonction dans commentManager vérifier si id existe (select => renvoie true ou false)
    //faire message avec session session_sucess/erreur;


  }
  //fonction pour afficher les commentaires signalés
  public function displayCommentsReported()
  {
    $commentManager = new CommentManager();
    $commentReported = $commentManager->displayCommentsReported();

    require('views/crudComment_view.php'); //renvoie la vue

  }

  //methode qui delete les commentaires

  public function deleteCommentController()
  {

    $deleteComment = new CommentManager;

    if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteCommentId = $_GET['deleteId'];
      $cancelComment = $deleteComment->deleteComment($deleteCommentId);
      header("location:index.php?page=crudread&readId=" . $_GET['articleId']);
    }
  }

  //methode qui affiche ts les articles dans la page crud
  public function displayArticlesController()
  {
    $articleObj = new NewsManager();

    // Delete NEWS from BDD
    if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
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

  //fonction qui affiche les commentaires en fontion de l'artilce: page livre
  //à faire : changer le nom de la methode, faire une class commentaire, separer les codes
  public function post()
  {
    if (!isset($_GET['id']) or !is_numeric($_GET['id'])) { //si le id n'est pas une valeur numérique on redirige vers home
      // header('Location: index.php?page=home');
    } else {
      extract($_GET); //on extrait le get   
      $id = strip_tags($id); //suprime le html et le php de la variable


      if (!empty($_POST)) {
        extract($_POST); //si il y a qq chose on extrait le post
        $errors = array(); //

        $author = strip_tags($author);
        $comment = strip_tags($comment);

        if (empty($author))
          array_push($errors, "Entrez un pseudo");

        if (empty($comment))
          array_push($errors, "entrez un commentaire");


        if (count($errors) == 0) // si il y a pas d'erreur
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

      if (isset($success))
        echo $sucess;

      if (!empty($errors)) : ?> //si il y a des erreurs on parcours le tableau
        <?php foreach ($errors as $error) : ?>
          <p><?= $error ?></p>
        <?php endforeach; ?>

<?php endif;
      require('views/post_view.php'); //renvoie la vue

    }
  } //fin de post




}//fin class
