<?php

namespace Models;

use Config\Model;

class ModelRecipe extends Model
{
    public $recipe;
    public $img;
    public function getSingleRecipe($id)
    {
        $query = $this->connect->prepare("select * from recipes left join categories on
        categories.category_id = recipes.category_id 
		left join authors on authors.author_id = recipes.author_id where recipes.id = $id");
        $query->execute();
        while ($row = $query->fetch()) {
            $this->recipe[] = $row;
        }
        return $this->recipe;
    }

    public function getRecipeImages($id)
    {
        $query = $this->connect->prepare("select * from images where recipe_id = $id");
        $query->execute();
        while ($row = $query->fetch()) {
            $this->img[] = $row;
        }
        return $this->img;
    }

    public function getRecipeViews($id)
    {
        $query = $this->connect->prepare("Update recipes Set views = views + 1 WHERE id = $id;");
        $query->execute();
    }
}
