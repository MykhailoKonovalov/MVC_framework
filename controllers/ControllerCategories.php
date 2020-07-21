<?php

namespace Controllers;

use Config\Controller;
use Config\Model;
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
        if (!isset($_GET["page"])) {
            $_GET["page"] = 1;
        }
        $categories = $this->model->sortedByCategories($_GET["id"]);
        $data = (new Model())->pagination($categories, $_GET['page'], 5);
        $content = array(
            "main" => array(
                "file" => "ViewCategories.php",
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
