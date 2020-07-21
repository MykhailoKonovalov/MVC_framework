<?php

namespace Models;

use Config\Model;

class ModelCategories extends Model
{
    public $categories;

    public function sortedByCategories($id)
    {
        $sql = $this->connect->prepare("select * from recipes left join categories on 
        categories.category_id = recipes.category_id left join images on recipes.id = images.recipe_id 
        WHERE images.url LIKE '%Main%' AND categories.category_id = :id order by id desc");
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
