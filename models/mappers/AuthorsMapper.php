<?php

namespace Models\Mappers;

use Core\Model;
use Models\Entities\Recipes;

class AuthorsMapper extends Model
{
    public $authors;

    public function sortedByAuthors($id)
    {
        $sql = $this->connect->prepare("SELECT * FROM recipes LEFT JOIN authors 
        ON authors.author_id = recipes.author_id  LEFT JOIN images ON recipes.id = images.recipe_id 
        WHERE images.url LIKE '%Main%' AND authors.author_id = :id ORDER BY id DESC");
        $sql->bindParam(":id", $id);
        $sql->execute();
        while ($row = $sql->fetch()) {
            $recipes = new Recipes();
            $recipes->id = $row["id"];
            $recipes->title = $row["title"];
            $recipes->content = $row["content"];
            $recipes->image = $row["url"];
            $recipes->author_name = $row["author_name"];
            $this->authors[] = $recipes;
        }
        return $this->authors;
    }
}
