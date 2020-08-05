<?php

namespace Models;

use Config\Model;

class ModelProfile extends Model
{
    public function getUser($id)
    {
        $sql = $this->connect->prepare("SELECT name, phone, email, phone, avatar FROM users WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        $user = new Users();
        while ($row = $sql->fetch()) {
            $user->name = $row["name"];
            $user->phone = $row["phone"];
            $user->email = $row["email"];
            $user->avatar = $row["avatar"];
        }
        return $user;
    }

    public function uploadImage($id, $avatar)
    {
        $sql = $this->connect->prepare("UPDATE users SET avatar = :avatar WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":avatar", $avatar);
        $sql->execute();
    }

    public function edit($userData, $id)
    {
        $password = password_hash($userData["newPassword"], PASSWORD_DEFAULT);
        if ($this->security($userData, $id)) {
            if (count(array_unique($this->validation($userData))) <= 1) {
                $sql = $this->connect->prepare("UPDATE users SET name = :username, email = :email, 
                phone = :phone, password = :password WHERE id = :id");
                $sql->bindParam(":id", $id);
                $sql->bindParam(":username", $userData["username"]);
                $sql->bindParam(":email", $userData["email"]);
                $sql->bindParam(":phone", $userData["phone"]);
                $sql->bindParam(":password", $password);
                $sql->execute();
                unset($_SESSION["errors"]);
            } else {
                $_SESSION["errors"] = $this->validation($userData);
            }
        } else {
            $_SESSION["errors"]["oldPassword"] = "Пароль не правильний";
        }
    }

    public function security($userData, $id)
    {
        $sql = $this->connect->prepare("SELECT password FROM users WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        while ($row = $sql->fetch()) {
            if (password_verify($userData["oldPassword"], $row["password"])) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function validation($userData)
    {
        if (
            isset($userData["username"]) && isset($userData["email"]) && isset($userData["phone"]) &&
            isset($userData["oldPassword"])
        ) {
            $errors["email"] = (new ModelSignup())->checkEmail($userData["email"]);
            $errors["phone"] = (new ModelSignup())->checkPhone($userData["phone"]);
            $errors["newPassword"] = (new ModelSignup())->checkPassword($userData["newPassword"]);
            return $errors;
        } else {
            $errors["username"] = "Помилка редагування!";
            return $errors;
        }
    }

    public function delete($id)
    {
        $sql = $this->connect->prepare("DELETE FROM users WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
    }
}
