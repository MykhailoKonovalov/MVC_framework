<?php

namespace Controllers;

use Core\Controller;
use Models\Mappers\ProfileMapper;
use Core\View;

class ControllerProfile extends Controller
{
    public function __construct()
    {
        $this->model = new ProfileMapper();
        $this->view = new View();
    }

    public function actionIndex()
    {
        if (!empty($_SESSION)) {
            if (empty($_SESSION["errors"])) {
                $errors = [];
            } else {
                $errors = $_SESSION["errors"];
                unset($_SESSION["errors"]);
            }
            $user = $this->model->getUser($_SESSION["id"]);
            $content = array(
                "main" => array(
                    "file" => "ViewProfile.php",
                    "data" => $user,
                    "errors" => $errors
                ));
            $contentArray = array_merge(
                (new ControllerMenu())->getAuthorsList(),
                (new ControllerMenu())->getCategoriesList(),
                $content
            );
            $_SESSION["username"] = $user->name;
            $_SESSION["avatar"] = $user->avatar;
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

    public function actionUploadImage()
    {
        $fileName = md5(stristr($_FILES["avatar"]["name"], ".", true));
        $fileType =  stristr($_FILES["avatar"]["name"], ".");
        $avatar = "/avatar/" . $fileName . $fileType;
        $filePath = $_SERVER["DOCUMENT_ROOT"] . '/views' . $avatar;
        $formatArray = array(".jpeg", ".jpg", ".png", ".webp", ".svg", ".gif");
        if (in_array($fileType, $formatArray) && $_FILES["avatar"]["size"] < 10000) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $filePath)) {
                $this->model->uploadImage($_SESSION["id"], $avatar);
                unset($_SESSION["errors"]["avatar"]);
            } else {
                $_SESSION["errors"]["avatar"] = "Помилка завантаження!";
            }
        } else {
            $_SESSION["errors"]["avatar"] = "Файл завеликий або має неправильне розширення!";
        }
        header("Location:http://cookbook.local/profile");
    }

    public function actionEdit()
    {
        if (isset($_POST)) {
            $username = (!empty($_POST["username"])) ? $_POST["username"] : $_SESSION["username"];
            $email = (!empty($_POST["email"])) ? $_POST["email"] : $_SESSION["email"];
            $phone = (!empty($_POST["phone"])) ? $_POST["phone"] : $_SESSION["phone"];
            $oldPassword = $_POST["oldPassword"];
            $newPassword = (!empty($_POST["newPassword"])) ? $_POST["newPassword"] : $oldPassword;
            $userData = array(
                "username" => $username,
                "email" => $email,
                "phone" => $phone,
                "oldPassword" => $oldPassword,
                "newPassword" => $newPassword
            );
                $this->model->edit($userData, $_SESSION["id"]);
        }
        header("Location:http://cookbook.local/profile");
    }

    public function actionDelete()
    {
        $this->model->delete($_SESSION["id"]);
        $this->actionSignout();
    }
}
