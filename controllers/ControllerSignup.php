<?php

namespace Controllers;

use Config\Controller;
use Models\ModelSignup;
use Config\View;

class ControllerSignup extends Controller
{
    public function __construct()
    {
        $this->model = new ModelSignup();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $data = $this->model->registration();
        $content = array(
            "main" => array(
                "file" => "ViewSignup.php",
                "data" => $data
            ));
        $contentArray = array_merge(
            (new ControllerMenu())->getAuthorsList(),
            (new ControllerMenu())->getCategoriesList(),
            $content
        );
        $this->view->renderContent($contentArray);
    }
}
