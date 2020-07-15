<?php

namespace Models;

use Config\Model;

class ModelAuthors extends Model
{
    protected $authors;

    public function sortedByAuthors($id)
    {
        $query = $this->connect->prepare("select * from recipes left join authors 
        on authors.author_id = recipes.author_id left join images on recipes.id = images.recipe_id 
        WHERE images.url LIKE '%Main%' AND authors.author_id = $id order by id desc");
        $query->execute();
        while ($row = $query->fetch()) {
            $this->authors[] = $row;
        }
        return $this->authors;
    }
}
