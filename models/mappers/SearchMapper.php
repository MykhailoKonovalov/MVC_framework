<?php

namespace Models\Mappers;

use Core\Model;
use Models\Entities\Recipes;

class SearchMapper extends Model
{
    public $result;

    public function search($query)
    {
        if (strripos($query, "'") !== false) {
            $query = str_replace("'", "\'", $query);
        }
        $sql = $this->connect->query("SELECT * FROM recipes LEFT JOIN images ON images.recipe_id = recipes.id 
        WHERE (recipes.title LIKE '%$query%' OR recipes.ingredients LIKE '%$query%' OR 
        recipes.content LIKE '%$query%') AND images.url LIKE '%Main%'");
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
