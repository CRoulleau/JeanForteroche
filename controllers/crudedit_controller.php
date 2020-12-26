<?php
  
  // Include database file
 // include '_classes/Crud.php';




  $articleObj = new NewsManager();



  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $article = $articleObj->getNewsById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['id'])) {
    $articleObj->updateNews($_POST['newtitle'] ,
     $_POST['newcontent'],  $_POST['newauthor'], $_POST['id'] );
  }  
    var_dump($_POST['newtitle']);
?>



