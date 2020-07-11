<?php

namespace Config;

class Model
{
    protected $recipesList;
    protected $recipe;
    protected $authorsList;
    protected $categoriesList;

    public function getAuthorsList()
    {
        if (file_exists("data" . DIRECTORY_SEPARATOR . "dataAuthors.php")) {
            $this->authorsList = require_once "data" . DIRECTORY_SEPARATOR . "dataAuthors.php";
        }
        return $this->authorsList;
    }

    public function getCategoriesList()
    {
        if (file_exists("data" . DIRECTORY_SEPARATOR . "dataAuthors.php")) {
            $this->categoriesList = require_once "data" . DIRECTORY_SEPARATOR . "dataCategories.php";
        }
        return $this->categoriesList;
    }

}
