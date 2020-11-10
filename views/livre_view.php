<!doctype html>
<html>
<head>

    <?php include_once 'views/includes/head.php'?>

    <title><?= ucfirst($page) ?> - Jean Forteroche</title>
</head>

<body>

    <?php include_once 'views/includes/header.php'?>

   


        <?php  
    
        while ($data = $req->fetch())
        {
    ?>
    <p><?php echo $data['title']; ?><br />
    <? echo $data['content']; ?><br />
    <a href="#" alt="#">Lire la suite</a>
</p>
       <?php
        
        }
            

        ?>
    
    
    
    <div>
    <p><a href="index.php?page=post&amp;id=7" alt="#">Article 1</a>
        </p>
    </div>
            <?php $req->closeCursor();?>

    
    
    <?php include_once 'views/includes/footer.php' ?>

    
    
</body>
</html>
