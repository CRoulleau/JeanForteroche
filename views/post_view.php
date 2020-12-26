<!--
require_once('_functions/getArticles.php');
$articles = getArticles(); 
 -->

<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>


<a href="index.php?page=livre">Retour aux articles</a>

    <h2><?= $article->getTitle() ?></h2>
    <br />
        <time><?= $article->getDate() ?></time>
    <br />

<?= $article->getContent() ?>
    <hr />
    
    
    
    <!--
    if(isset($success))
        echo $sucess;
        
    if(!empty($errors)): ?> //si il y a des erreurs on parcours le tableau
    foreach($errors as $error): 
        <p><?= $error ?></p>
    php endforeach; 
    
     endif; -->
    
    
    
<form action="index.php?page=post&amp;id=<?= $article->getId() ?>" method="post">
    <p><label for="author">Pseudo: </label><br />
        <input type="text" name="author" id="author" value="<?php if(isset($author)) echo $author ?>"></p>
    <p><label for="comment">Commentaire: </label><br />
        <textarea name="comment" id="comment" rows="8" cols="30"><?php if(isset($comment)) echo $comment ?></textarea></p>
    <button type="submit">Envoyer</button>
    
    
    
    </form>
    <h2>Commentaires: </h2>
    <?php foreach($comments as $com): ?>
    <h3><?= $com->author ?></h3>
    <time><?= $com->comment_date ?></time>
    <p><?= $com->comment ?></p>
    <?php endforeach; ?>
    





 <?php include_once 'views/includes/footer.php' ?>

    
    
</body>
</html>












