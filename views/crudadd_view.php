<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>



<div class="card text-center" style="padding:15px;">
  <h4>Tableau de Bord: J'ajoute un article</h4>
</div><br> 

<div class="container">
  <form action="index.php?page=crudadd" method="POST">
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" name="title" placeholder="Enter un titre" required="">
    </div>
    <div class="form-group">
      <label for="content">Description :</label>
      <input type="text" class="form-control" name="content" placeholder="Ecrivez" required="">
    </div>
    <div class="form-group">
      <label for="date">Date:</label>
      <input type="text" class="form-control" name="date" placeholder="Enter une date" required="">
    </div>
    
    <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
  </form>

</div>

    
    <div class="sidebar_secondary_home">       
        
        
        
    </div>
        
    
    
    <?php include_once 'views/includes/footer.php' ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    
</body>
</html>
