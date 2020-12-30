<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>


    <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        
      </tr>
    </thead>
    <tbody>
        
<tr> 




          <td><?php echo $article->getId() ?></td>
          <td><?php echo $article->getTitle() ?></td>
          <td><?php echo $article->getContent() ?></td>
          <td><?php echo $article->getDate() ?></td>
    </tr> 
    </tbody>
  </table>
    
    
    
    
    

<div><h2>Les Commentaires</h2>
        
       <table class="table table-hover"> 
        <thead>
      <tr>
        <th>Auteur</th>
        <th>Commentaire</th>
        <th>Date</th>
           <td>Supprimer           
          </td>
        <th>?</th>
      </tr>
    </thead>
    <tbody>
        
        
    

        
         <?php 
        $commentDisplay = new ArticlesController();
        $commentDisplayById = $commentDisplay->getCommentController();
         foreach($commentDisplayById as $com):
          ?>

        
        <tr>
            <td><h3><?php echo $com->author ?></h3></td>
            <td> <p><?php echo $com->comment ?></p></td>
            <td><time><?php echo $com->DateComment ?></time></td>
            

           <td><a href="index.php?page=crudread&amp;deleteId=<?= $com->id   ?>&articleId=<?= $article->getId() ?>"  ><button>Supprimer</button></a>
           <?php endforeach; ?>

</td>
        
        
        
        </tr>
        
            </tbody>

        
        </table>
</div>
        
    
     <div class="sidebar_secondary_home">       
        
        
        
    </div>
        
    
    <a></a>
    <?php include_once 'views/includes/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

        
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>