<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>

 <?php $test = $req->fetch();

             echo $test['title']. '<br />'. $test['content']. '<br />'; ?>
    
    
    
 <h2>Vos commentaires</h2>  
    
    <?php  
     
     echo '<p><a href="index.php?page=post&amp;idArticles=7" alt="#">voir les commentaires</a>
        </p>';
    

   
   // $test1 = $reponse->fetch();
    //echo $test1['a.id'];
    
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['idArticles']) . '</strong> : ' . htmlspecialchars($donnees['postId']) . '</p>';
}



$reponse->closeCursor();

    
  ?>  
    
    
    
    
    
    <h3>Ajoutez vos commentaires</h3>
    
    <form  method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="author" id="author" /><br />
        <label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Envoyer" />
	</p>
    </form>
    
  
    
    
    
    
    
   
    
    
      <?php include_once 'views/includes/footer.php' ?>

    
    
</body>
</html>