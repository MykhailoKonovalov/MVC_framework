<?php

namespace Config;

use Controllers\ControllerSignin;

class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        session_start();
    }
}
