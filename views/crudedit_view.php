<!doctype html>
<html>

<head>

  <?php include_once 'views/includes/head.php' ?>

  <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

  <?php include_once 'views/includes/header.php' ?>




  <div class="card text-center" style="padding:15px;">
    <h4>Tableau de bord: J'édite mes articles</h4>
  </div><br>

  <div class="container">
    <form action="index.php?page=crudedit" method="POST">
      <div class="form-group">
        <label for="title">Titre:</label>
        <input type="text" class="form-control" name="newtitle" value="<?php echo $article->getTitle(); ?>" required="">
      </div>
      <div class="form-group">
        <label for="content">Description:</label>
        <input type="text" class="form-control" name="newcontent" value="<?php echo $article->getContent(); ?>" required="">
      </div>
      <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" class="form-control" name="newauthor" value="<?php echo $article->getAuthor(); ?>" required="">
      </div>
      <div class="form-group">
        <input type="hidden" name="id" value="<?php echo $article->getId(); ?>">
        <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="Mise à jour">
      </div>
    </form>



  </div>



  <div class="sidebar_secondary_home">



  </div>



  <?php include_once 'views/includes/footer.php' ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</body>

</html>