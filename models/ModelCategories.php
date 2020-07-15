<?php

namespace Models;

use Config\Model;

class ModelCategories extends Model
{
    protected $categories;

    public function sortedByCategories($id)
    {
        $query = $this->connect->prepare("select * from recipes left join categories on 
        categories.category_id = recipes.category_id left join images on recipes.id = images.recipe_id 
        WHERE images.url LIKE '%Main%' AND categories.category_id = $id order by id desc");
        $query->execute();
        while ($row = $query->fetch()) {
            $this->categories[] = $row;
        }
        return $this->categories;
    }
}
