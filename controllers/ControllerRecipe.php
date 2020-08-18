<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Models\Mappers\RecipeMapper;

class ControllerRecipe extends Controller
{
    public function __construct()
    {
        $this->model = new RecipeMapper();
        $this->view = new View();
    }

    public function actionIndex()
    {
        $this->model->setRecipeViews($_GET["id"]);
        $this->model->setRecipeLikes($_GET["id"]);
        $recipe = $this->model->getSingleRecipe($_GET["id"]);
        $recipeImg = $this->model->getRecipeImages($_GET["id"]);
        $likeButton = '';
        if (!empty($_SESSION["id"])) {
            $likeButton = $this->model->checkLike($_GET["id"], $_SESSION["id"]);
        }
        if (empty($recipe)) {
            header("Location: http://cookbook.local/404");
        } else {
            $content = array(
                "main" => array(
                    "file" => "ViewRecipe.php",
                    "data" => $recipe,
                    "img" => $recipeImg,
                    "likeButton" => $likeButton
                ));
            $contentArray = array_merge(
                (new ControllerMenu())->getAuthorsList(),
                (new ControllerMenu())->getCategoriesList(),
                $content
            );
            $this->view->renderContent($contentArray);
        }
    }

    public function actionCreateComment()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $this->model->insertComment($data, $_GET["id"]);
    }

    public function actionGetComments()
    {
        $comments = $this->model->getComments($_GET['id']);
        echo $comments;
    }
}
