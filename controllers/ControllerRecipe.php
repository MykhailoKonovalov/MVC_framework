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
        $recipeImg = $this->model->getRecipeImages($_GET["id"]);
        $this->model->setRecipeViews($_GET["id"]);
        $content = array(
            "main" => array(
                "file" => "ViewRecipe.php",
                "data" => $recipe,
                "img" => $recipeImg
            ));
        $contentArray = array_merge(
            (new ControllerMenu())->getAuthorsList(),
            (new ControllerMenu())->getCategoriesList(),
            $content
        );
        $this->view->renderContent($contentArray);
    }
}
