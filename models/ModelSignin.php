<?php

namespace Models;

use Config\Model;

class ModelSignin extends Model
{
    public function signin($data)
    {
        $userData = new Users();
        $userData->name = $data["username"];
        $userData->password = $data["password"];
        $sql = $this->connect->prepare("SELECT * FROM users WHERE name = :username");
        $sql->bindParam(":username", $userData->name);
        $sql->execute();
        $user = new Users();
        while ($row = $sql->fetch()) {
            if (password_verify($userData->password, $row["password"])) {
                $user->id = $row["id"];
                $user->name = $row["name"];
                $user->email = $row["email"];
                $user->phone = $row["phone"];
                $user->avatar = $row["avatar"];
                $user->password = $row["password"];
                return $user;
            } else {
                return false;
            }
        }
    }
}
