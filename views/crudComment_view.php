<!doctype html>
<html>

<head>

  <?php include_once 'views/includes/head.php' ?>

  <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

  <?php include_once 'views/includes/header.php' ?>

  <table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Commentaires</th>
        <th>Approuver</th>
        <th>Supprimer</th>


      </tr>
    </thead>
    <tbody>


      <?php


      foreach ($commentReported as $comment) {
      ?>
        <tr>
          <td><?php echo $comment->getId() ?></td>
          <td><?php echo $comment->getComment() ?></td>
          <td><a href="index.php?page=crudcomment"><button>Approuver</button></a></td>
          <td><a href="index.php?page=crudcomment"><button>Supprimer</button></a></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>


  <?php include_once 'views/includes/footer.php' ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</body>

</html>