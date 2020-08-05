<?php

namespace Controllers;

use Config\Controller;
use Config\Model;
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
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }
        $recipes = $this->model->getRecipesList();
        $data = (new Model())->pagination($recipes, $_GET['page'], 5);
        $content = array(
            "main" => array(
                "file" => "ViewMain.php",
                "data" => $data[0],
                "count" => $data[1]
        ));
        $contentArray = array_merge(
            (new ControllerMenu())->getAuthorsList(),
            (new ControllerMenu())->getCategoriesList(),
            $content
        );
        $this->view->renderContent($contentArray);
    }
}

