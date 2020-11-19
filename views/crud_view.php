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
    <a href="index.php?page=crudadd" class="btn btn-primary" style="float:right;">Ajouter un article</a>
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
          $articles = $articleObj->displayData(); 
        

          foreach ($articles as $article) {
        ?>
        <tr>
          <td><?php echo $article['id'] ?></td>
          <td><?php echo $article['title'] ?></td>
          <td><?php echo $article['content'] ?></td>
          <td><?php echo $article['date'] ?></td>
          <td>
            <a href="index.php?page=crudedit&amp;editId=<?php echo $article['id'] ?>" style="color:green">
              <button>Editer</button></a>
              <br />
            <a href="index.php?page=crud&amp;deleteId=<?php echo $article['id'] ?>" style="color:red" onclick="confirm('Etes-vous certain de vouloir supprimer cet article')">
<button>Supprimer</button>            </a>
          </td>
        </tr>

      <?php } ?>
    </tbody>
  </table>
</div>

    
    <div class="sidebar_secondary_home">       
        
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        
    </div>
        
   
    
    <?php include_once 'views/includes/footer.php' ?>



    
</body>
</html>