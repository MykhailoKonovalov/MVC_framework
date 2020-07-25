<?php

namespace Controllers;

use Config\Controller;
use Controllers\ControllerSignin;
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
            $userData = array(
                "username" => $_POST["username"],
                "email" => $_POST["email"],
                "phone" => $_POST["phone"],
                "password" => $_POST["password"],
                "repeat_password" => $_POST["repeat_password"]
            );
            $response = $this->model->signup($userData);
            $user = (new ModelSignin())->signin($userData);
            (new ControllerSignin())->createSession($user[0]);
        } else {
            $response = [];
        }
            $content = array(
                "main" => array(
                    "file" => "ViewSignup.php",
                    "data" => $response
                ));
            $contentArray = array_merge(
                (new ControllerMenu())->getAuthorsList(),
                (new ControllerMenu())->getCategoriesList(),
                $content
            );
            $this->view->renderContent($contentArray);
    }
}
