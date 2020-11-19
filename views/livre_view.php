<?php 

//$articles = getArticles(); ?>

<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?> 
    
 <h2>Articles</h2>
    <?php foreach($articles as $article): ?>
    <h2><?= $article->title ?></h2>
    <a href="index.php?page=post&amp;id=<?= $article->id ?>">Lire la suite</a><br />
    <time><?= $article->date ?></time>
    <?php endforeach; ?>
    
    <?php include_once 'views/includes/footer.php' ?>

    
    
</body>
</html>
