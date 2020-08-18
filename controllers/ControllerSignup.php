<?php

namespace Controllers;

use Core\Controller;
use Models\Mappers\SigninMapper;
use Models\Mappers\SignupMapper;
use Core\View;

class ControllerSignup extends Controller
{
    public function __construct()
    {
        $this->model = new SignupMapper();
        $this->view = new View();
    }

    public function actionIndex()
    {
        if (!empty($_POST)) {
            $data = $this->model->signup($_POST);
                $user = (new SigninMapper())->signin($_POST);
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
