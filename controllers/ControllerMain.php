<?php

namespace Controllers;

use Config\Controller;
use Config\View;
use Models\ModelMain;

class ControllerMain extends Controller
{

    public function __construct()
    {
        $this->model = new ModelMain();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $recipes = $this->model->getRecipesList();
        $content = array(
            "main" => array(
                "file" => "ViewMain.php",
                "data" => $recipes
        ));
        $contentArray = array_merge(parent::getAuthorsList(), parent::getCategoriesList(), $content);
        $this->view->renderContent($contentArray);
    }
}
