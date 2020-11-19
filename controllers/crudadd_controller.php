<?php

  // Include database file
  //include '_classes/Crud.php';

  $articleObj = new Articles();

  // Insert Record in customer table
  if(isset($_POST['submit'])) {
    $articleObj->insertData($_POST);
  }

?>
