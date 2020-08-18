<?php

namespace Controllers;

use Core\Controller;
use Core\Model;
use Core\View;
use Models\Mappers\AuthorsMapper;

class ControllerAuthors extends Controller
{
    public function __construct()
    {
        $this->model = new AuthorsMapper();
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
