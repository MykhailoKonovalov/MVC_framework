<?php

namespace Controllers;

use Core\Controller;
use Core\Model;
use Core\View;
use Models\Mappers\CategoriesMapper;

class ControllerCategories extends Controller
{
    public function __construct()
    {
        $this->model = new CategoriesMapper();
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
