<?php

namespace Controllers;

use Config\Controller;
use Models\ModelMenu;

class ControllerMenu extends Controller
{
    public function __construct()
    {
        $this->model = new ModelMenu();
    }

    public function getAuthorsList()
    {
        $authorsList = $this->model->getAuthorsList();
        return array(
            "authors" => array(
                "file" => "AuthorsList.php",
                "data" => $authorsList
            ));
    }

    public function getCategoriesList()
    {
        $categoriesList = $this->model->getCategoriesList();
        return array(
            "categories" => array(
                "file" => "CategoriesList.php",
                "data" => $categoriesList
            ));
    }
}
