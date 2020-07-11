<?php

namespace Config;

class Controller
{
    public function __construct()
    {
        $this->model = new Model();
    }

    public function getAuthorsList()
    {
        $authorsList = $this->model->getAuthorsList();
        $content = array(
            "authors" => array(
                "file" => "AuthorsList.php",
                "data" => $authorsList
            ));
        return $content;
    }

    public function getCategoriesList()
    {
        $categoriesList = $this->model->getCategoriesList();
        $content = array(
            "categories" => array(
                "file" => "CategoriesList.php",
                "data" => $categoriesList
            ));
        return $content;
    }
}
