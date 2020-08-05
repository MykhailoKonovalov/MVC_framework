<?php

namespace Models;

use Config\Model;

class ModelSignup extends Model
{
    public $errors;

    public function signup($data)
    {
        $user = new Users();
        $user->name = $data["username"];
        $user->email = $data["email"];
        $user->phone = $data["phone"];
        $user->password = $data["password"];
        $repeatPassword = $data["repeat_password"];
        $password = password_hash($user->password, PASSWORD_DEFAULT);
        if (count(array_unique($this->validationData($user, $repeatPassword))) <= 1) {
            $sql = $this->connect->prepare("INSERT INTO users (name, email, phone, password, avatar) VALUES 
            (:name, :email, :phone, :password, '/avatar/default.jpeg')");
            $sql->bindParam(":name", $user->name);
            $sql->bindParam(":email", $user->email);
            $sql->bindParam(":phone", $user->phone);
            $sql->bindParam(":password", $password);
            $sql->execute();
            return true;
        } else {
            return $this->validationData($user, $repeatPassword);
        }
    }

    public function validationData($user, $repeatPassword)
    {
        if (
            isset($user->name) && isset($user->email) && isset($user->phone) &&
            isset($user->password) && isset($repeatPassword)
        ) {
            $errors["username"] = $this->checkUsername($user->name);
            $errors["email"] = $this->checkEmail($user->email);
            $errors["phone"] = $this->checkPhone($user->phone);
            $errors["password"] = $this->checkPassword($user->password);
            $errors["repeatPassword"] = $this->checkRepeatPassword($user->password, $repeatPassword);
            return $errors;
        } else {
            $errors["username"] = "Помилка реєстрації!";
            return $errors;
        }
    }

    public function checkUsername($username)
    {
        $sql = $this->connect->prepare("SELECT id FROM users WHERE name = :username");
        $sql->bindParam(":username", $username);
        $sql->execute();
        if (!empty($sql->fetch())) {
            return "Користувач з таким іменем вже існує!";
        } else {
            return true;
        }
    }

    public function checkEmail($email)
    {
        if (preg_match('/@/', $email)) {
            return true;
        } else {
            return  "Email введено некоректно!";
        }
    }

    public function checkPhone($phone)
    {
        if (preg_match("/^([+])??[0-9]{4,}$/", $phone)) {
            return true;
        } else {
            return "Номер телефону введено некоректно!";
        }
    }

    public function checkPassword($password)
    {
        if (preg_match('/^(?=.*\d)(?=.*[A-Za-z])[^\t\n\r\f\v]{6,}$/', $password)) {
            return true;
        } else {
            return "Пароль повинен бути довшим за 6 символів та містити цифри і латинські букви!";
        }
    }

    public function checkRepeatPassword($password, $repeatPassword)
    {
        if ($password === $repeatPassword) {
            return true;
        } else {
            return "Повторний пароль не співпадає!";
        }
    }
}
