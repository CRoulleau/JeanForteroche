<?php
session_start();
require '_classes/autoloader.php';
Autoloader::register();
require 'controllers/HomeController.php';
require 'controllers/ArticlesController.php';
require 'controllers/AdminController.php';
//une route par page par £route
// Définition de la page courante
if (isset($_GET['page']) and !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}
require 'routeur.php';
