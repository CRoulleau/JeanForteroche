<?php
  
  // Include database file
 //include_once '_classes/Articles.php';

  /*$articleObj = new NewsManager();

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
      $deleteId = $_GET['deleteId'];
      $articleObj->deleteNews($deleteId);
  }

   */  
?> 





<?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Votre article a été ajouté
            </div>";
      } 
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              Votre article a été modifié
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "Votre article a été supprimé";
    }
    
  ?>
 








