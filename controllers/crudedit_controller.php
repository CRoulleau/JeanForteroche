<?php
  
  // Include database file
 // include '_classes/Crud.php';

  $articleObj = new Articles();

  // Edit customer record
  if(isset($_GET['editId']) && !empty($_GET['editId'])) {
    $editId = $_GET['editId'];
    $article = $articleObj->displyaRecordById($editId);
  }

  // Update Record in customer table
  if(isset($_POST['update'])) {
    $articleObj->updateRecord($_POST);
  }  
    
?>



