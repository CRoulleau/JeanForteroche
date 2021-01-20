<?php


class AdminController
{

   public function checkEmailPws()
   {

      if ($_POST) {
         $adminManager = new AdminManager();
         $loginVerify = $adminManager->login($_POST['email'], $_POST['passw']);


         if ($loginVerify == false) {
            echo "erreur";
         } else {
            header("location: index.php?page=crud "); //renvoie la vue

         }
      } else {
         require('views/admin_view.php'); //renvoie la vue

      }
   }
}//fin class