<?php

namespace Config;

use Controllers\ControllerMain;

class View
{
    public function renderContent($content)
    {
        include("views/Template.php");
    }
}
