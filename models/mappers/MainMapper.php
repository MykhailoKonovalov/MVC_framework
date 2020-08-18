<?php

namespace Models\Mappers;

use Core\Model;
use Models\Entities\Recipes;

class MainMapper extends Model
{
    public $recipesList;

    public function getRecipesList()
    {
        $sql = $this->connect->query("SELECT * FROM recipes LEFT JOIN images ON images.recipe_id = recipes.id 
        WHERE images.url LIKE '%Main%' ORDER BY id DESC");
        while ($row = $sql->fetch()) {
            $recipe = new Recipes();
            $recipe->id = $row["id"];
            $recipe->title = $row["title"];
            $recipe->content = $row["content"];
            $recipe->image = $row["url"];
            $this->recipesList[] = $recipe;
        }
        return $this->recipesList;
    }
}
