<?php

namespace Models;

use Config\Model;

class ModelSignin extends Model
{
    public $userData;

    public function signin($userData)
    {
        $sql = $this->connect->prepare("select * from users where name = :username");
        $sql->bindParam(":username", $userData["username"]);
        $sql->execute();
        while ($row = $sql->fetch()) {
            if (password_verify($userData["password"], $row["password"])) {
                $user = new Users();
                $user->id = $row["id"];
                $user->name = $row["name"];
                $user->email = $row["email"];
                $user->phone = $row["phone"];
                $user->password = $row["password"];
                $this->userData[] = $user;
            } else {
                return false;
            }
            return $this->userData;
        }
    }
}
