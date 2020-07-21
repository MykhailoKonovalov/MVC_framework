<?php

namespace Models;

use Config\Model;

class ModelAuthors extends Model
{
    public $authors;

    public function sortedByAuthors($id)
    {
        $sql = $this->connect->prepare("select * from recipes left join authors 
        on authors.author_id = recipes.author_id left join images on recipes.id = images.recipe_id 
        WHERE images.url LIKE '%Main%' AND authors.author_id = :id order by id desc");
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
