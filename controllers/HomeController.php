<?php

class HomeController{

    public function home() {
        require('views/home_view.php'); //renvoie la vue
    }
    public function biographie() {
        require('views/biographie_view.php'); //renvoie la vue
    }
    public function contact() {
        require('views/contact_view.php'); //renvoie la vue
    }
    public function livre(){
        $displayArticles = new NewsManager();
        $displayArticles->getNews();
        require('views/livre_view.php');
    }
    
   

   
    
    

    //FONCTION AFFICHER PAGE AVEC LISTE DES NEWS
    //INSTANCIER MON MODELE (variable)
    //MODELE VARIABLE->function
    //require de ma vue pour afficher ses commentaire



}