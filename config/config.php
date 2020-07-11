<?php

namespace Config;

use Router\Router;

require_once "Router.php";
require_once "Controller.php";
require_once "Model.php";
require_once "View.php";

new View();
new Controller();
Router::start();
