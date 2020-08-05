<?php

namespace Config;

class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        session_start();
    }
}
