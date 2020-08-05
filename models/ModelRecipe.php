<?php

namespace Models;

use Config\Model;

class ModelRecipe extends Model
{
    public $recipe;
    public $image;
    public $comments;

    public function getSingleRecipe($id)
    {
        $sql = $this->connect->prepare("SELECT * FROM recipes LEFT JOIN authors ON 
        authors.author_id = recipes.author_id LEFT JOIN categories ON 
        categories.category_id = recipes.category_id WHERE recipes.id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        while ($row = $sql->fetch()) {
            $recipe = new Recipes();
            $recipe->id = $row["id"];
            $recipe->title = $row["title"];
            $recipe->ingredients = $row["ingredients"];
            $recipe->content = $row["content"];
            $recipe->views = $row["views"];
            $recipe->category_id = $row["category_id"];
            $recipe->category_title = $row["category_title"];
            $recipe->author_id = $row["author_id"];
            $recipe->author_name = $row["author_name"];
            $this->recipe[] = $recipe;
        }
        return $this->recipe;
    }

    public function getRecipeImages($id)
    {
        $sql = $this->connect->prepare("SELECT * FROM images WHERE recipe_id = $id");
        $sql->execute();
        while ($row = $sql->fetch()) {
            $image = new Images();
            $image->image_id = $row["img_id"];
            $image->url = $row["url"];
            $image->recipe_id = $row["recipe_id"];
            $this->image[] = $image;
        }
        return $this->image;
    }

    public function setRecipeViews($id)
    {
        $sql = $this->connect->prepare("UPDATE recipes SET views = views + 1 WHERE id = $id;");
        $sql->execute();
    }

    public function setRecipeLikes($id)
    {
            $sql = $this->connect->prepare("UPDATE recipes set recipes.likes = (SELECT COUNT(DISTINCT (user_id))
            FROM wish_list WHERE recipe_id = :id1) WHERE recipes.id = :id2");
            $sql->bindParam(":id1", $id);
            $sql->bindParam(":id2", $id);
            $sql->execute();
    }

    public function checkLike($recipe, $user)
    {
        $sql = $this->connect->prepare("SELECT COUNT(*) FROM wish_list 
        WHERE recipe_id = :recipe AND user_id = :user");
        $sql->bindParam(":recipe", $recipe);
        $sql->bindParam(":user", $user);
        $sql->execute();
        $result = $sql->fetch();
        return $result["COUNT(*)"];
    }

    public function insertComment($data, $id)
    {
        $comment = new Comments();
        $comment->username = $data["username"];
        $comment->text = $data["text"];
        $comment->recipeId = $id;
        $sql = $this->connect->prepare("INSERT INTO comments (username, text, recipe_id) VALUES 
        (:username, :text, :recipe_id)");
        $sql->bindParam(":username", $comment->username);
        $sql->bindParam(":text", $comment->text);
        $sql->bindParam(":recipe_id", $comment->recipeId);
        $sql->execute();
    }

    public function getComments($id)
    {
        $sql = $this->connect->prepare("SELECT * FROM comments WHERE recipe_id = :recipe_id ORDER BY id DESC");
        $sql->bindParam(":recipe_id", $id);
        $sql->execute();
        while ($row = $sql->fetch()) {
            $comments = new Comments();
            $comments->id = $row["id"];
            $comments->username = $row["username"];
            $comments->text = $row["text"];
            $comments->recipeId = $row["recipe_id"];
            $this->comments[] = $comments;
        }
        return json_encode($this->comments);
    }
}
