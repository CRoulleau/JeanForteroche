<?php
require '_classes/autoloader.php';
Autoloader::register();
require 'controllers/HomeController.php';
require 'controllers/ArticlesController.php';
//une route par page par £route
// Définition de la page courante
if (isset($_GET['page']) AND !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}
require 'routeur.php';
//require '_classes/autoloader.php';
//Autoloader::register();
//require 'models/Bdd.php';

//require 'controllers/HomeController.php';
//require 'controllers/ArticlesController.php';

//require '_classes/Bdd.php';
//mettre dans controller en fonction du but
//include_once '_classes/Bdd.php';
//include_once '_classes/News.php';
/*include_once '_classes/NewsManager.php';
include_once '_classes/Comment.php';
include_once '_classes/CommentManager.php';

//include_once '_classes/Test.php';

*/









// Tableau contenant toutes les pages
/*$allPages = scandir('controllers/');

// Vérification de l'existence de la page
if (in_array($page.'_controller.php', $allPages)) {

    
    // Inclusion de la page
  //  include_once 'models/'.$page.'_model.php';
    include_once 'controllers/'.$page.'_controller.php';
    //include_once 'views/'.$page.'_view.php';

} else {

    echo "erreur 404";

}
*/

?>