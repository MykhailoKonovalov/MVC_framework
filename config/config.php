<?php

namespace Config;

use Router\Router;


require_once "Router.php";
require_once "Controller.php";
require_once "Model.php";
require_once "View.php";

require_once "controllers/ControllerMenu.php";
require_once "models/ModelMenu.php";
//require_once "controllers/ControllerSearch.php";
//require_once "models/ModelSearch.php";

require_once "models/Authors.php";
require_once "models/Categories.php";
require_once "models/Images.php";
require_once "models/Recipes.php";
require_once "models/Users.php";

new Controller();
Router::start();
