<?php

namespace Models;

use Config\Model;

class ModelMenu extends Model
{
    protected $authorsList;
    protected $categoriesList;

    public function getAuthorsList()
    {
        $query = $this->connect->query("select * from authors");
        while ($row = $query->fetch()) {
            $this->authorsList[] = $row;
        }
        return $this->authorsList;
    }

    public function getCategoriesList()
    {
        $query = $this->connect->query("select * from categories");
        while ($row = $query->fetch()) {
            $this->categoriesList[] = $row;
        }
        return $this->categoriesList;
    }
}
