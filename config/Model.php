<?php

namespace Config;

use PDO;

class Model
{
    protected $connect;

    public function __construct()
    {
        $this->mysqlConnection();
    }

    public function mysqlConnection()
    {
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->connect = new PDO("mysql:host=localhost;dbname=cookbook;charset=utf8", "padmin", "ZzA9))7u", $options);
        if (!isset($this->connect)) {
            echo "No connection!";
        } else {
            return "Yes connection!";
        }
    }

    public function pagination($data, $page, $limit)
    {
        $start = ($page - 1) * $limit;
        $finish = $page * $limit;
        $pageData = [];
        if (!empty($data)) {
            for ($i = $start; $i < $finish; $i++) {
                if (isset($data[$i])) {
                    $pageData[] = $data[$i];
                } else {
                    continue;
                }
            }
            $countOfPages = ceil(count($data) / $limit);
            return array($pageData, $countOfPages);
        } else {
            return false;
        }
    }
}
