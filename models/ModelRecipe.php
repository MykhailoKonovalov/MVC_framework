<?php

namespace Models;

use Config\Model;

class ModelRecipe extends Model
{
    public $recipe;
    public $image;

    public function getSingleRecipe($id)
    {
        $sql = $this->connect->prepare("select * from recipes left join authors on 
        authors.author_id = recipes.author_id left join categories on 
        categories.category_id = recipes.category_id where recipes.id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        while ($row = $sql->fetch()) {
            $recipe = new Recipes();
            $recipe->id = $row["id"];
            $recipe->title = $row["title"];
            $recipe->ingredients = $row["ingredients"];
            $recipe->content = $row["content"];
            $recipe->views = $row["id"];
            $recipe->category_id = $row["category_id"];
            $recipe->category_title = $row["category_title"];
            $recipe->author_id = $row["author_id"];
            $recipe->author_name = $row["author_name"];
            $this->recipe[] = $recipe;
        }
        return $this->recipe;
    }

    public function getRecipeImages($id)
    {
        $query = $this->connect->prepare("select * from images where recipe_id = $id");
        $query->execute();
        while ($row = $query->fetch()) {
            $image = new Images();
            $image->image_id = $row["img_id"];
            $image->url = $row["url"];
            $image->recipe_id = $row["recipe_id"];
            $this->image[] = $image;
        }
        return $this->image;
    }

    public function setRecipeViews($id)
    {
        $query = $this->connect->prepare("Update recipes Set views = views + 1 WHERE id = $id;");
        $query->execute();
    }
}
