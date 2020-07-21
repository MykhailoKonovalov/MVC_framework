<?php

namespace Models;

use Config\Model;

class ModelSearch extends Model
{
    public $result;

    public function search($query)
    {
        if (strripos($query, "'") !== false) {
            $query = str_replace("'", "\'", $query);
        }
        $sql = $this->connect->query("select * from recipes left join images on images.recipe_id = recipes.id 
        where (recipes.title like '%$query%' or recipes.ingredients like '%$query%' or 
        recipes.content like '%$query%') and images.url like '%Main%'");
        $sql->execute();
        while ($row = $sql->fetch()) {
            $recipes = new Recipes();
            $recipes->id = $row["id"];
            $recipes->title = $row["title"];
            $recipes->content = $row["content"];
            $recipes->ingredients = $row["ingredients"];
            $recipes->image = $row["url"];
            $this->result[] = $recipes;
        }
        return $this->result;
    }

}
