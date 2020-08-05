<?php

namespace Controllers;

use Config\Controller;
use Config\Model;
use Models\ModelWishlist;
use Config\View;

class ControllerWishlist extends Controller
{
    public function __construct()
    {
        $this->model = new ModelWishlist();
        $this->view = new View();
    }

    public function actionIndex()
    {
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }
        if ($_SESSION["id"]) {
            $recipes = $this->model->getWishList($_SESSION["id"]);
            $data = (new Model())->pagination($recipes, $_GET['page'], 5);
            $content = array(
                "main" => array(
                    "file" => "ViewWishList.php",
                    "data" => $data[0],
                    "count" => $data[1]
                ));
            $contentArray = array_merge(
                (new ControllerMenu())->getAuthorsList(),
                (new ControllerMenu())->getCategoriesList(),
                $content
            );
            $this->view->renderContent($contentArray);
        } else {
            header("Location: http://cookbook.local/signin");
        }
    }

    public function actionGetLikes()
    {
        $likes = $this->model->getLikesCount($_GET["id"]);
        echo $likes;
    }

    public function actionAddRecipe()
    {
        $this->model->addRecipe($_SESSION["id"], $_GET["id"]);
    }

    public function actionRemoveRecipe()
    {
        $this->model->removeRecipe($_SESSION["id"], $_GET["id"]);
    }
}
