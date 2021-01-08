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
        <th>Commentaires</th>
        <th>Approuver</th>
        <th>Supprimer</th>

        
      </tr>
    </thead>
    <tbody>
        

<?php
//$articleObj = new CommentManager();
//$comments = $articleObj->getComment('readId'); 
        

          foreach ($commentReported as $comment) {
        ?>
<tr> 
          <td><?php echo $comment->getId() ?></td>
          <td><?php echo $comment->getComment() ?></td>
          <td><a href="index.php?page=crudcomment&amp;readId=<?= $com->id   ?>&articleId=<?= $article->getId() ?>"  ><button>Approuver</button></a></td>
          <td><a href="index.php?page=crudcomment&amp;deleteId=<?= $com->id   ?>&articleId=<?= $article->getId() ?>"  ><button>Supprimer</button></a></td>
    </tr> 
    <?php } ?>

    </tbody>
  </table>
    

    <?php include_once 'views/includes/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

        

</body>
</html>
