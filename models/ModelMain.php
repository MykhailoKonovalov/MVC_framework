<?php

namespace Models;

use Config\Model;

class ModelMain extends Model
{
    public $recipesList;

    public function getRecipesList()
    {
        $sql = $this->connect->query("select * from recipes left join images on images.recipe_id = recipes.id 
        where images.url like '%Main%' order by id desc");
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
