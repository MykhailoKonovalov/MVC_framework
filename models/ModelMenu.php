<?php

namespace Models;

use Config\Model;

class ModelMenu extends Model
{
    public $authorsList;
    public $categoriesList;

    public function getAuthorsList()
    {
        $sql = $this->connect->query("SELECT * FROM authors");
        while ($row = $sql->fetch()) {
            $authors = new Authors();
            $authors->author_id = $row["author_id"];
            $authors->author_name = $row["author_name"];
            $this->authorsList[] = $authors;
        }
        return $this->authorsList;
    }

    public function getCategoriesList()
    {
        $query = $this->connect->query("SELECT * FROM categories");
        while ($row = $query->fetch()) {
            $categories = new Categories();
            $categories->category_id = $row["category_id"];
            $categories->category_title = $row["category_title"];
            $this->categoriesList[] = $categories;
        }
        return $this->categoriesList;
    }
}
