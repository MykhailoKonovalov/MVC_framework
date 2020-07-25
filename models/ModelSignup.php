<?php

namespace Models;

use Config\Model;

class ModelSignup extends Model
{
    public function signup($userData)
    {
        $response = $this->validationData($userData);
        $password = password_hash($userData["password"], PASSWORD_DEFAULT);
        if (count(array_unique($response)) <= 1) {
            $sql = $this->connect->prepare("insert into users (name, email, phone, password) values 
            (:name, :email, :phone, :password)");
            $sql->bindParam(":name", $userData["username"]);
            $sql->bindParam(":email", $userData["email"]);
            $sql->bindParam(":phone", $userData["phone"]);
            $sql->bindParam(":password", $password);
            $sql->execute();
            return "Користувач " . $userData['username'] . " успішно зареєстрований";
        } else {
            return $response;
        }
    }

    public function validationData($userData)
    {
        $response = [];
        if (
            isset($userData["username"]) && isset($userData["email"]) && isset($userData["phone"]) &&
            isset($userData["password"]) && isset($userData["repeat_password"])
        ) {
            $usernameResponse = $this->checkUsername($userData["username"]);

            if (preg_match('/@/', $userData["email"])) {
                $emailResponse = true;
            } else {
                $emailResponse = "Email введено некоректно!";
            }

            if (preg_match("/^([+])??[0-9]{4,}$/", $userData["phone"])) {
                $phoneResponse = true;
            } else {
                $phoneResponse = "Номер телефону введено некоректно!";
            }

            if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[^\t\n\r\f\v]{6,}$/', $userData["repeat_password"])) {
                $passwordResponse = true;
            } else {
                $passwordResponse = "Пароль повинен бути довшим за 6 символів та містити цифри і латинські букви!";
            }
            if ($userData["password"] === $userData["repeat_password"]) {
                $repeatPasswordResponse = true;
            } else {
                $repeatPasswordResponse = "Повторний пароль не співпадає!";
            }

            $response = array(
                "usernameResponse" => $usernameResponse,
                "emailResponse" => $emailResponse,
                "phoneResponse" => $phoneResponse,
                "passwordResponse" => $passwordResponse,
                "repeatPasswordResponse" => $repeatPasswordResponse
            );
            return $response;
        } else {
            return false;
        }
    }

    public function checkUsername($username)
    {
        $sql = $this->connect->prepare("select id from users where name = :username");
        $sql->bindParam(":username", $username);
        $sql->execute();
        if (!empty($sql->fetch())) {
            return "Користувач з таким іменем вже існує!";
        } else {
            return true;
        }
    }
}
