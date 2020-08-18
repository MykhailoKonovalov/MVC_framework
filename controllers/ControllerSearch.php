<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Models\Mappers\SearchMapper;

class ControllerSearch extends Controller
{
    public function __construct()
    {
        $this->model = new SearchMapper();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $query = strip_tags($_POST["query"]);
        if (!empty($query)) {
            $result = $this->model->search($query);
        } else {
            $result = [];
        }
        $content = array(
            "main" => array(
                "file" => "ViewSearch.php",
                "data" => $result
            ));
        $contentArray = array_merge(
            (new ControllerMenu())->getAuthorsList(),
            (new ControllerMenu())->getCategoriesList(),
            $content
        );
        $this->view->renderContent($contentArray);
    }
}
