<?php

namespace Controllers;

use Config\Controller;
use Config\Model;
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
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }
        $authors = $this->model->sortedByAuthors($_GET["id"]);
        $data = (new Model())->pagination($authors, $_GET['page'], 5);
        $content = array(
            "main" => array(
                "file" => "ViewAuthors.php",
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
