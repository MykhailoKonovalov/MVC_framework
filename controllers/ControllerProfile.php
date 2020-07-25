<?php

namespace Controllers;

use Config\Controller;
use Models\ModelProfile;
use Config\View;

class ControllerProfile extends Controller
{
    public function __construct()
    {
        $this->model = new ModelProfile();
        $this->view = new View();
    }

    public function actionIndex()
    {
        if (!empty($_SESSION)) {
            $content = array(
                "main" => array(
                    "file" => "ViewProfile.php"
                ));
            $contentArray = array_merge(
                (new ControllerMenu())->getAuthorsList(),
                (new ControllerMenu())->getCategoriesList(),
                $content
            );
            $this->view->renderContent($contentArray);
        } else {
            header("Location:http://cookbook.local/main");
        }
    }

    public function actionSignout()
    {
        session_unset();
        session_destroy();
        header("Location:http://cookbook.local/signin");
    }
}
