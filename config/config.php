<?php

namespace Config;

use Router\Router;

require_once "Router.php";
require_once "Controller.php";
require_once "Model.php";
require_once "View.php";

require_once "controllers/ControllerMenu.php";
require_once "models/ModelMenu.php";

new Controller();
Router::start();
