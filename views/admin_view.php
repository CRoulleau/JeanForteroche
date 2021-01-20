<!doctype html>
<html>

<head>

  <?php include_once 'views/includes/head.php' ?>

  <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

  <?php include_once 'views/includes/header.php' ?>

  <h2>Connectez-vous</h2>


  <div class="container">
    <form action="index.php?page=admin" method="POST">
      <div class="form-group">

        <div class="form-group">
          <label for="email">Email :</label>
          <input type="text" class="form-control" name="email" placeholder="email" required="">
        </div>

        <div class="form-group">
          <label for="passw">Mot de passe:</label>
          <input type="text" class="form-control" name="passw" required="">
        </div>
        <div class="form-group">
          <input type="hidden" name="id">

          <input type="submit" name="submit" class="btn btn-primary" style="float:right;" value="Submit">
        </div>
    </form>

  </div>

  <?php include_once 'views/includes/footer.php' ?>
  </div>
</body>

</html>