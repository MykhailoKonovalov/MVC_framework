<?php

namespace Controllers;

use Config\Controller;
use Config\View;
use Models\ModelSearch;

class ControllerSearch extends Controller
{

    public function __construct()
    {
        $this->model = new ModelSearch();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $query = strip_tags($_POST["query"]);
        if (!empty($query)) {
            $result = $this->model->search($query);
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
