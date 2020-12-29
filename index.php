<?php

include_once '_classes/autoloader.php';
Autoloader::register();
//require 'models/Bdd.php';

require 'controllers/HomeController.php';
require 'controllers/ArticlesController.php';
require 'controllers/CommentController.php';
//require '_classes/Bdd.php';
//mettre dans controller en fonction du but
//include_once '_classes/Bdd.php';
//include_once '_classes/News.php';
/*include_once '_classes/NewsManager.php';
include_once '_classes/Comment.php';
include_once '_classes/CommentManager.php';

//include_once '_classes/Test.php';

*/
//une route par page par £route
// Définition de la page courante
if (isset($_GET['page']) AND !empty($_GET['page'])) {
    $page = trim(strtolower($_GET['page']));
} else {
    $page = 'home';
}

$homeController = new HomeController();
$articlesController = new ArticlesController();
$commentController = new CommentController();

switch($page){//la fonction du controller
    case "home": 
        $homeController->home();
        break;
    case "biographie": 
        $homeController->biographie();
            break;
    case "contact": 
        $homeController->contact();
            break;   
    case "livre": 
        $homeController->livre();
            break;
    case "post": 
        $articlesController->post();
            break;
    case "crud": 
        $articlesController->displayArticlesController();
            break;
    case "crudadd": 
        $articlesController->crudAddController();
            break;
    case "crudedit": 
       
        $articlesController->crudEditController();
            break;
    case "crudread":
        $articlesController->crudReadController();
            break;

    default:
        throw new Exception('Routing dispatch not found');        
        //case qui va afficher la liste des news
        //variable->function





}






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