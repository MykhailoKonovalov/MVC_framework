<?php

namespace Controllers;

use Config\Controller;
use Config\View;
use Models\ModelRecipe;


class ControllerRecipe extends Controller
{
    public function __construct()
    {
        $this->model = new ModelRecipe();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $recipe = $this->model->getSingleRecipe($_GET["id"]);
        $content = array(
            "main" => array(
                "file" => "ViewRecipe.php",
                "data" => $recipe
            ));
        $contentArray = array_merge(parent::getAuthorsList(), parent::getCategoriesList(), $content);
        $this->view->renderContent($contentArray);
    }
}
