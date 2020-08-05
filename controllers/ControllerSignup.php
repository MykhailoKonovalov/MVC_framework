<?php

namespace Controllers;

use Config\Controller;
use Models\ModelSignin;
use Models\ModelSignup;
use Config\View;

require_once "models/ModelSignin.php";
require_once "controllers/ControllerSignin.php";

class ControllerSignup extends Controller
{
    public function __construct()
    {
        $this->model = new ModelSignup();
        $this->view = new View();
    }

    public function actionIndex()
    {
        if (!empty($_POST)) {
            $data = $this->model->signup($_POST);
                $user = (new ModelSignin())->signin($_POST);
            if ((new ControllerSignin())->createSession($user) === true) {
                header("Location:http://cookbook.local/profile");
            }
        } else {
            $data = [];
        }
            $content = array(
                "main" => array(
                    "file" => "ViewSignup.php",
                    "errors" => $data
                ));
            $contentArray = array_merge(
                (new ControllerMenu())->getAuthorsList(),
                (new ControllerMenu())->getCategoriesList(),
                $content
            );
            $this->view->renderContent($contentArray);
    }
}
