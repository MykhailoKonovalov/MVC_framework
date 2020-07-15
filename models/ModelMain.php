<?php

namespace Models;

use Config\Model;

class ModelMain extends Model
{
    protected $recipesList;

    public function getRecipesList()
    {
        $query = $this->connect->query("select * from recipes left join categories on 
		categories.category_id = recipes.category_id left join authors on authors.author_id = recipes.author_id
		left join images on recipes.id = images.recipe_id WHERE images.url LIKE '%Main%' order by id desc");
        while ($row = $query->fetch()) {
            $this->recipesList[] = $row;
        }
        return $this->recipesList;
    }
}
