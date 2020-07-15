<?php

namespace Controllers;

use Config\Controller;
use Config\View;
use Models\ModelAuthors;

class ControllerAuthors extends Controller
{
    public function __construct()
    {
        $this->model = new ModelAuthors();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $authors = $this->model->sortedByAuthors($_GET["id"]);
        $content = array(
            "main" => array(
                "file" => "ViewAuthors.php",
                "data" => $authors
            ));
        $contentArray = array_merge(
            (new ControllerMenu())->getAuthorsList(),
            (new ControllerMenu())->getCategoriesList(),
            $content
        );
        $this->view->renderContent($contentArray);
    }
}
