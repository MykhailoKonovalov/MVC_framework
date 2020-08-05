<?php

namespace Models;

use Config\Model;

class ModelCategories extends Model
{
    public $categories;

    public function sortedByCategories($id)
    {
        $sql = $this->connect->prepare("SELECT * FROM recipes  LEFT JOIN categories ON 
        categories.category_id = recipes.category_id  LEFT JOIN images ON recipes.id = images.recipe_id 
        WHERE images.url LIKE '%Main%' AND categories.category_id = :id ORDER BY id DESC");
        $sql->bindParam(":id", $id);
        $sql->execute();
        while ($row = $sql->fetch()) {
            $recipes = new Recipes();
            $recipes->id = $row["id"];
            $recipes->title = $row["title"];
            $recipes->image = $row["url"];
            $recipes->content = $row["content"];
            $recipes->category_title = $row["category_title"];
            $this->categories[] = $recipes;
        }
        return $this->categories;
    }
}
