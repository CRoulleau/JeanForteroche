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
          
        
          <td><?php echo $article['id'] ?></td>
          <td><?php echo $article['title'] ?></td>
          <td><?php echo $article['content'] ?></td>
          <td><?php echo $article['date'] ?></td>
    </tr> 

    </tbody>
  </table>
    
    
    
    
    
    

<div><h2>Les Commentaires</h2>
        
       <table class="table table-hover"> 
        <thead>
      <tr>
        <th>Auteur</th>
        <th>Date</th>
        <th>Commentaire</th>
           <td>Supprimer           
          </td>
        <th>?</th>
      </tr>
    </thead>
    <tbody>
        
        
        
        <?php         
        


        
         foreach($comments as $com) { ?>
        
        <tr>
            <td><h3><?= $com->author ?></h3></td>
            <td><time><?= $com->comment_date ?></time></td>
             <td> <p><?= $com->comment ?></p></td>
            <td><a href="index.php?page=crudread&amp;idComment<?php echo $cancelComment['id']   ?>"  ><button>Supprimer</button></a>

</td>
        
        
        
        
        </tr>
        
        <?php } ?>
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