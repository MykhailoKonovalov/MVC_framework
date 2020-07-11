<?php

namespace Models;

use Config\Model;

class ModelRecipe extends Model
{
    public function getSingleRecipe($id)
    {
        if (file_exists("data" . DIRECTORY_SEPARATOR . "dataRecipes.php")) {
            $this->recipe = require_once "data" . DIRECTORY_SEPARATOR . "dataRecipes.php";
        }
            return $this->recipe[$id - 1];
    }
}
