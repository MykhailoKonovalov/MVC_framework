<?php

namespace Models\Mappers;

use Core\Model;
use Models\Entities\Recipes;
use Models\Entities\WishList;

class WishlistMapper extends Model
{
    public $list;

    public function getWishList($user)
    {
        $sql = $this->connect->prepare("SELECT DISTINCT * FROM recipes LEFT JOIN wish_list 
        ON recipes.id = wish_list.recipe_id LEFT JOIN images ON images.recipe_id = recipes.id 
        WHERE images.url LIKE '%Main%' AND wish_list.user_id = :user ORDER BY id DESC");
        $sql->bindParam(":user", $user);
        $sql->execute();
        while ($row = $sql->fetch()) {
            $recipe = new Recipes();
            $recipe->id = $row["id"];
            $recipe->title = $row["title"];
            $recipe->content = $row["content"];
            $recipe->image = $row["url"];
            $this->list[] = $recipe;
        }
        return $this->list;
    }

    public function getLikesCount($id)
    {
        $sql = $this->connect->prepare("SELECT COUNT(DISTINCT user_id) FROM `wish_list` WHERE recipe_id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        $result = $sql->fetch()["COUNT(DISTINCT user_id)"];
        return $result;
    }

    public function addRecipe($user, $recipe)
    {
        $likes = (new RecipeMapper())->checkLike($recipe, $user);
        if ($likes === 0) {
            $list = new WishList();
            $list->user_id = $user;
            $list->recipe_id = $recipe;
            $sql = $this->connect->prepare("INSERT INTO wish_list (user_id, recipe_id) VALUE (:user, :recipe)");
            $sql->bindParam(":user", $list->user_id);
            $sql->bindParam(":recipe", $list->recipe_id);
            $sql->execute();
        }
    }

    public function removeRecipe($user, $recipe)
    {
        $list = new WishList();
        $list->user_id = $user;
        $list->recipe_id = $recipe;
        $sql = $this->connect->prepare("DELETE FROM wish_list WHERE user_id = :user AND recipe_id = :recipe");
        $sql->bindParam(":user", $list->user_id);
        $sql->bindParam(":recipe", $list->recipe_id);
        $sql->execute();
    }
}
