<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>


<div class="card text-center" style="padding:15px;">
  <h4>Tableau de bord</h4>
</div><br><br> 

<div class="container">
    
    
  
  <h2>Vos articles
    <a href="index.php?page=crudadd" class="btn btn-primary" style="float:right;">Ajouter un article</a> <br />  <br />
    <a href="index.php?page=crudcomment"class="btn btn-primary" style="float:right;">Vos commentaires signalés</a>

  </h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php 
          $articles = $articleObj->getNews(); 
        

          foreach ($articles as $article) {
        ?>
        <tr>
          <td><?php echo $article->getId() ?></td>
          <td><?php echo $article->getTitle() ?></td>
          <td><?php echo $article->getContent() ?></td>
          <td><?php echo $article->getDate() ?></td>
            
            <td>
            <a href="index.php?page=crudread&amp;readId=<?php echo $article->getId() ?>" style="color:green">
              <button>Voir</button></a>
                        </td>
            
          <td>
            <a href="index.php?page=crudedit&amp;editId=<?php echo $article->getId() ?>" style="color:green">
              <button>Editer</button></a>
                        </td>
            <br />
              <td>
            <a href="index.php?page=crud&amp;deleteId=<?php echo $article->getId() ?>" style="color:red" onclick="confirm('Etes-vous certain de vouloir supprimer cet article')">
<button>Supprimer</button>            </a>
          </td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
</div>

    
    <div class="sidebar_secondary_home">    
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        
    </div>
        
   
    
    <?php include_once 'views/includes/footer.php' ?>



    
</body>
</html>