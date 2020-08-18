<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Controller404 extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function actionIndex()
    {
        $content = array(
            "main" => array(
                "file" => "View404.php"
            ));
        $contentArray = array_merge(
            (new ControllerMenu())->getAuthorsList(),
            (new ControllerMenu())->getCategoriesList(),
            $content
        );
        $this->view->renderContent($contentArray);
    }
}
