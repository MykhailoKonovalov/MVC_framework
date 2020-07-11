<?php

namespace Models;

use Config\Model;

class ModelMain extends Model
{
    public function getRecipesList()
    {
        if (file_exists("data" . DIRECTORY_SEPARATOR . "dataRecipes.php")) {
            $this->recipesList = require_once "data" . DIRECTORY_SEPARATOR . "dataRecipes.php";
        }
        return $this->recipesList;
    }
}
