<!doctype html>
<html>

<head>

  <?php include_once 'views/includes/head.php' ?>

  <title><?= ucfirst($page) ?> - Jean Forteroche</title>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: 'textarea'
    });
  </script>
</head>

<body>

  <?php include_once 'views/includes/header.php' ?>

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
        <textarea type="text" class="form-control" name="content" placeholder="Ecrivez" required=""></textarea>
      </div>
      <div class="form-group">
        <label for="author">author:</label>
        <input type="text" class="form-control" name="author" placeholder="Jean Forteroche" required="">
      </div>
      <div class="form-group">
        <input type="hidden" name="id">

        <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
      </div>
    </form>
  </div>
  <div class="sidebar_secondary_home">
  </div>
  <?php include_once 'views/includes/footer.php' ?>
</body>

</html>