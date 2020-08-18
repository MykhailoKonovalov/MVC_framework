<?php

namespace Controllers;

use Core\Controller;
use Models\Mappers\SigninMapper;
use Core\View;

class ControllerSignin extends Controller
{
    public function __construct()
    {
        $this->model = new SigninMapper();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $response = [];
        if (!empty($_POST)) {
            $response = $this->model->signin($_POST);
            if ($this->createSession($response) === true) {
                header("Location:http://cookbook.local/profile");
            } else {
                header("Location:http://cookbook.local/signin");
            }
        }
        $content = array(
            "main" => array(
                "file" => "ViewSignin.php",
                "data" => $response
            ));
        $contentArray = array_merge(
            (new ControllerMenu())->getAuthorsList(),
            (new ControllerMenu())->getCategoriesList(),
            $content
        );
        $this->view->renderContent($contentArray);
    }

    public function createSession($user)
    {
        if (!empty($user)) {
            $_SESSION["id"] = $user->id;
            return true;
        } else {
            return false;
        }
    }
}
