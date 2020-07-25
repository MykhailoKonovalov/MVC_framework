<?php

namespace Controllers;

use Config\Controller;
use Models\ModelSignin;
use Config\View;

class ControllerSignin extends Controller
{
    public function __construct()
    {
        $this->model = new ModelSignin();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $response = [];
        if (!empty($_POST)) {
            $userData = array(
                "username" => $_POST["username"],
                "password" => $_POST["password"]
            );
            $response = $this->model->signin($userData);
            $this->createSession($response[0]);
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
        $_SESSION["id"] = $user->id;
        $_SESSION["username"] = $user->name;
        $_SESSION["phone"] = $user->phone;
        $_SESSION["email"] = $user->email;

        header("Location:http://cookbook.local/profile");
    }
}
