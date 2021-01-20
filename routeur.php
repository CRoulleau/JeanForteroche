<?php

$homeController = new HomeController();
$articlesController = new ArticlesController();
$adminController = new AdminController();

switch ($page) { //la fonction du controller
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
        if (isset($_GET['deleteId'])) {
            //changer fonctions
            $articlesController->deleteCommentController();
        } else {
            $articlesController->crudReadController();
        }
        break;
    case "reportedcomment":
        $articlesController->reportedComment();
        break;
    case "crudcomment":
        $articlesController->displayCommentsReported();
        break;
    case "admin": //page connexion
        $adminController->checkEmailPws();
        break;
    case "deconnexion": //page connexion
        $adminController->checkEmailPws();
        break;


    default:
        throw new Exception('Routing dispatch not found');
}
