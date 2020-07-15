<?php

namespace Controllers;

use Config\Controller;
use Config\View;
use Models\ModelCategories;

class ControllerCategories extends Controller
{
    public function __construct()
    {
        $this->model = new ModelCategories();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $categories = $this->model->sortedByCategories($_GET["id"]);
        $content = array(
            "main" => array(
                "file" => "ViewCategories.php",
                "data" => $categories
            ));
        $contentArray = array_merge(
            (new ControllerMenu())->getAuthorsList(),
            (new ControllerMenu())->getCategoriesList(),
            $content
        );
        $this->view->renderContent($contentArray);
    }
}
